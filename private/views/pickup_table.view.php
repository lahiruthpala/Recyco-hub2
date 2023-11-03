<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Material Dashboard Lite</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">


    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">


    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Services Section</title>
    <!-- Font Awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="C_style.css" />

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,100,700,900' rel='stylesheet'
        type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- inject:css -->
    <link rel="stylesheet" href="css/lib/getmdl-select.min.css">
    <link rel="stylesheet" href="css/lib/nv.d3.min.css">
    <link rel="stylesheet" href="css/application.min.css">
    <!-- endinject -->

    <meta charset="utf-8">
    <title>User list page - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arial+Rounded+MT+Bold" rel="stylesheet">
    <style>
        body {
            font-family: "Arial Rounded MT Bold", "Arial", sans-serif;
            /* Change the font family */
            font-size: 16px;
            /* Change the font size */
        }

        /* USER LIST TABLE */
        .user-list tbody td>img {
            position: relative;
            max-width: 50px;
            float: left;
            margin-right: 15px;
        }

        .user-list tbody td .user-link {
            display: block;
            font-family: 'Verdana', sans-serif;
            /* Change the font family */
            font-size: 1.25em;
            padding-top: 3px;
            margin-left: 60px;
        }

        .user-list tbody td .user-subhead {
            font-size: 0.875em;
            font-style: italic;
        }

        /* TABLES */
        .table {
            border-collapse: separate;
            font-family: 'Arial Rounded MT Bold', 'Arial', sans-serif;

        }

        .table-hover>tbody>tr:hover>td,
        .table-hover>tbody>tr:hover>th {
            background-color: #eee;
        }

        .table thead>tr>th {
            border-bottom: 1px solid #C2C2C2;
            padding-bottom: 0;
        }

        .table tbody>tr>td {
            font-size: 0.875em;
            background: #f5f5f5;
            border-top: 10px solid #fff;
            vertical-align: middle;
            padding: 12px 8px;
            font-family: "Arial Rounded MT Bold", "Arial", sans-serif;
        }

        .table tbody>tr>td:first-child,
        .table thead>tr>th:first-child {
            padding-left: 20px;
        }

        .table thead>tr>th span {
            border-bottom: 2px solid #C2C2C2;
            display: inline-block;
            padding: 0 5px;
            padding-bottom: 5px;
            font-weight: normal;
        }

        .table thead>tr>th>a span {
            color: #344644;
        }

        .table thead>tr>th>a span:after {
            content: "\f0dc";
            font-family: FontAwesome;
            font-style: normal;
            font-weight: normal;
            text-decoration: inherit;
            margin-left: 5px;
            font-size: 0.75em;
        }

        .table thead>tr>th>a.asc span:after {
            content: "\f0dd";
        }

        .table thead>tr>th>a.desc span:after {
            content: "\f0de";
        }

        .table thead>tr>th>a:hover span {
            text-decoration: none;
            color: #2bb6a3;
            border-color: #2bb6a3;
        }

        .table.table-hover tbody>tr>td {
            -webkit-transition: background-color 0.15s ease-in-out 0s;
            transition: background-color 0.15s ease-in-out 0s;
        }

        .table tbody tr td .call-type {
            display: block;
            font-size: 0.75em;
            text-align: center;
        }

        .table tbody tr td .first-line {
            line-height: 1.5;
            font-weight: 400;
            font-size: 1.125em;
        }

        .table tbody tr td .first-line span {
            font-size: 0.875em;
            color: #969696;
            font-weight: 300;
        }

        .table tbody tr td .second-line {
            font-size: 0.875em;
            line-height: 1.2;
        }

        button {
            background-color: #04AA6D;
            color: white;
            border: none;
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 4px;
        }

        /* Target all <td> elements within the table with class 'user-list' */
        .table.user-list tbody tr td {
            font-family: "Arial Rounded MT Bold", "Arial", sans-serif;

            font-size: 16px;
        }
    </style>
</head>

<body>
    <?php $this->view('include/header') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-box clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                                <tr>
                                    <th><span>Pickup</span></th>
                                    <th><span>Pickup ID</span></th>
                                    <th><span>Date</span></th>
                                    <th><span>Time</span></th>
                                    <th class="text-center"><span>Status</span></th>
                                    <th>&nbsp;</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <i class="fas fa-truck-pickup fa-3x"></i>
                                    </td>
                                    <td>P1234</td>
                                    <td>2023/08/08</td>
                                    <td>12:30</td>
                                    <td class="text-center">
                                        <span class="label label-default">Inactive</span>
                                    </td>
                                    <td>
                                        <button class="button" onclick="viewDetails('P12346')">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fas fa-truck-pickup fa-3x"></i>
                                    </td>
                                    <td>P1235</td>
                                    <td>2023/08/23</td>
                                    <td>14:10</td>
                                    <td class="text-center">
                                        <span class="label label-success">Active</span>
                                    </td>
                                    <td>
                                        <button class="button" onclick="viewDetails('P12346')">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fas fa-truck-pickup fa-3x"></i>
                                    </td>
                                    <td>P1236</td>
                                    <td>2023/08/25</td>
                                    <td>16:40</td>
                                    <td class="text-center">
                                        <span class="label label-danger">Banned</span>
                                    </td>
                                    <td>
                                        <button class="button" onclick="viewDetails('P12346')">View</button>
                                    </td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>
                                        <i class="fas fa-truck-pickup fa-3x"></i>
                                    </td>
                                    <td>P1237</td>
                                    <td>2023/08/30</td>
                                    <td>12:55</td>
                                    <td class="text-center">
                                        <span class="label label-success">Active</span>
                                    </td>
                                    <td>
                                        <button class="button" onclick="viewDetails('P12346')">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fas fa-truck-pickup fa-3x"></i>
                                    </td>
                                    <td>P1238</td>
                                    <td>2023/09/05</td>
                                    <td>12:45</td>
                                    <td class="text-center">
                                        <span class="label label-success">Active</span>
                                    </td>
                                    <td>
                                        <button class="button" onclick="viewDetails('P12346')">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fas fa-truck-pickup fa-3x"></i>
                                    </td>
                                    <td>P1239</td>
                                    <td>2023/09/06</td>
                                    <td>11:55</td>
                                    <td class="text-center">
                                        <span class="label label-default">Inactive</span>
                                    </td>
                                    <td>
                                        <button class="button" onclick="viewDetails('P12346')">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fas fa-truck-pickup fa-3x"></i>
                                    </td>
                                    <td>P12310</td>
                                    <td>2023/09/13</td>
                                    <td>09:23</td>
                                    <td class="text-center">
                                        <span class="label label-default">Inactive</span>
                                    </td>
                                    <td>
                                        <button class="button" onclick="viewDetails('P12346')">View</button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <script>
                            {
                                function viewDetails(pickupId) {
                                    // Redirect to pickup_details.html with the pickup ID as a query parameter
                                    window.location.href = `order.html?pickupID=${pickupId}`;
                                }
                            }
                        </script>

                        <script data-cfasync="false"
                            src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
                        <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
                        <script type="text/javascript">
                            // Your JavaScript code can go here
                        </script>


                        <!-- inject:js -->
                        <script src="js/d3.min.js"></script>
                        <script src="js/getmdl-select.min.js"></script>
                        <script src="js/material.min.js"></script>
                        <script src="js/nv.d3.min.js"></script>
                        <script src="js/layout/layout.min.js"></script>
                        <script src="js/scroll/scroll.min.js"></script>
                        <script src="js/widgets/charts/discreteBarChart.min.js"></script>
                        <script src="js/widgets/charts/linePlusBarChart.min.js"></script>
                        <script src="js/widgets/charts/stackedBarChart.min.js"></script>
                        <script src="js/widgets/employer-form/employer-form.min.js"></script>
                        <script src="js/widgets/line-chart/line-charts-nvd3.min.js"></script>
                        <script src="js/widgets/map/maps.min.js"></script>
                        <script src="js/widgets/pie-chart/pie-charts-nvd3.min.js"></script>
                        <script src="js/widgets/table/table.min.js"></script>
                        <script src="js/widgets/todo/todo.min.js"></script>
                        <!-- endinject -->
</body>

</html>