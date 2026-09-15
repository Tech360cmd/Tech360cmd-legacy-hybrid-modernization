/**
 * Headless Core Integration Logic Validation Suite
 * Leverages JSDOM execution environments to cleanly execute unit tests on legacy AngularJS controllers
 * without running a full browser instance.
 */

const { expect } = require('chai');
const { JSDOM } = require('jsdom');

describe('Enterprise Catalog App Logic Test Matrix', () => {
    let window, jQuery, angular;

    beforeEach(() => {
        // Construct a functional mockup DOM structure representing our application layout
        const dom = new JSDOM(`
            <!DOCTYPE html>
            <html>
            <head></head>
            <body>
                <div id="sandbox-root"></div>
            </body>
            </html>
        `, { runScripts: "dangerously" });

        window = dom.window;
        global.window = window;
        global.document = window.document;
        
        // Inject dependencies mock interfaces onto headless runtime
        jQuery = require('jquery')(window);
        global.$ = jQuery;
        global.jQuery = jQuery;

        // Load runtime assets programmatically
        require('angular/angular.min.js');
        angular = window.angular;
        global.angular = angular;

        // Load our explicit codebase logic script
        require('../../app.js');
    });

    afterEach(() => {
        // Clean global memory footprint hooks
        delete global.window;
        delete global.document;
        delete global.$;
        delete global.jQuery;
        delete global.angular;
    });

    it('Should register the core app module cleanly', () => {
        const moduleExists = angular.module('enterpriseCatalogApp') !== undefined;
        expect(moduleExists).to.be.true;
    });

    it('Should safely escape hazardous markup scripts via SecuritySanitizer', () => {
        // Extract the target instantiated service layer
        const $injector = angular.injector(['ng', 'enterpriseCatalogApp']);
        const sanitizer = $injector.get('SecuritySanitizer');
        
        const payload = '<script>alert("XSS Vector Attack Input")</script>';
        const verifiedOutput = sanitizer.sanitizeString(payload);
        
        // Assert that the vulnerable brackets were converted into safe entities
        expect(verifiedOutput).to.not.include('<script>');
        expect(verifiedOutput).to.include('&lt;script&gt;');
    });
});
