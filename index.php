<!DOCTYPE html>
<html lang="en" ng-app="enterpriseCatalogApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech360cmd | Hybrid Modernization Portfolio Sandbox</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif; background-color: #f6f8fa; color: #24292f; padding: 24px; }
        .container { max-width: 1000px; margin: 0 auto; background: #ffffff; border: 1px solid #d0d7de; border-radius: 6px; padding: 32px; }
        .header-banner { border-bottom: 2px solid #eaeef2; padding-bottom: 16px; margin-bottom: 24px; }
        .system-badge { display: inline-block; padding: 4px 8px; font-size: 12px; font-weight: 600; border-radius: 2em; background-color: #ddf4ff; color: #0969da; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { text-align: left; padding: 12px; border-bottom: 1px solid #d0d7de; }
        th { background-color: #f6f8fa; font-weight: 600; }
        .alert-box { background-color: #ffebe9; color: #cf222e; border: 1px solid #ffc1c0; padding: 12px; border-radius: 6px; margin-bottom: 16px; }
        .legacy-jquery-target { display: none; } /* Managed explicitly via jQuery wrapper directive */
    </style>
</head>
<body ng-controller="CatalogController">

    <div class="container">
        <div class="header-banner">
            <h2>System Catalog Integration Dashboard</h2>
            <span class="system-badge">Platform Hybrid Core: PHP + AngularJS 1.8 + jQuery</span>
        </div>

        <!-- Infrastructure Status Message Handler -->
        <div class="alert-box" ng-if="systemAlert" ng-clock>
            <strong>System Notification:</strong> {{ systemAlert }}
        </div>

        <!-- Catalog Render Wrapper Matrix -->
        <div jquery-legacy-panel class="legacy-jquery-target">
            <h3>Active Project Subsystems</h3>
            <div ng-if="!loaded">Loading distributed technical ledger components...</div>
            
            <table ng-if="loaded">
                <thead>
                    <tr>
                        <th>Asset ID</th>
                        <th>Component Classification Registry</th>
                        <th>Core Sector Track</th>
                        <th>Operational Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="item in catalogItems">
                        <td><strong>#{{ item.id }}</strong></td>
                        <td>{{ item.name }}</td>
                        <td>{{ item.category }}</td>
                        <td>
                            <span style="color: {{ item.status === 'Active' ? '#1a7f37' : '#9a6700' }}">
                                ● {{ item.status }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Core Runtime Dependecies Bundling Strategy (Simulating RedHat Vendor Directives) -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/angular/angular.min.js"></script>
    <script src="app.js"></script>
</body>
</html>
