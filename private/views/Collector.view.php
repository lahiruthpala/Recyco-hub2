<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <link rel="icon" type="image/png" href="images/DB_16х16.png">
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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap"
      rel="stylesheet"
    />

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,100,700,900' rel='stylesheet'
        type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- inject:css -->
    <link rel="stylesheet" href="<?=ROOT?>/css/lib/getmdl-select.min.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/lib/nv.d3.min.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/application.min.css">
    <link rel="stylesheet" href="<?=ROOT?>/css/C_style.css" />
    <!-- endinject -->

</head>

<body>
    <header>
        <?php $this->view('include/header')?>
    </header>

    <section>
        
      <div class="row">
        <h2 class="section-heading">Our Services</h2>
      </div>
      <div class="row">
      
        <div class="column" id="pickuptable">
          <a href="<?=ROOT?>/collector/table">
           <div class="card">
            <div class="icon-wrapper">
              <i class="fas fa-book"></i>
            </div>
            <h3><b>View Pickup Requests</b></h3>
          
           </div>
          </a>
        </div>
        <div class="column">
          <div class="card">
            <div class="icon-wrapper">
              <i class="fas fa-truck-pickup"></i>
            </div>
            <h3><b>Update Pickup Status</b></h3>
          
          </div>
        </div>
        <div class="column">
          <div class="card">
            <div class="icon-wrapper">
              <i class="fas fa-qrcode"></i>
            </div>
            <h3><b>Generate QR</b></h3>
          </div>
        </div>
        <div class="column">
          <div class="card">
            <div class="icon-wrapper">
              <i class="fas fa-pencil-alt"></i>
            </div>
            <h3><b>Upadate Inventory</b></h3>
           
          </div>
       
    </section>
  

    <!-- inject:js -->
    <script src="<?=ROOT?>/js/d3.min.js"></script>
    <script src="<?=ROOT?>/js/getmdl-select.min.js"></script>
    <script src="<?=ROOT?>/js/material.min.js"></script>
    <script src="<?=ROOT?>/js/nv.d3.min.js"></script>
    <script src="<?=ROOT?>/js/layout/layout.min.js"></script>
    <script src="<?=ROOT?>/js/scroll/scroll.min.js"></script>
    <script src="<?=ROOT?>/js/widgets/charts/discreteBarChart.min.js"></script>
    <script src="<?=ROOT?>/js/widgets/charts/linePlusBarChart.min.js"></script>
    <script src="<?=ROOT?>/js/widgets/charts/stackedBarChart.min.js"></script>
    <script src="<?=ROOT?>/js/widgets/employer-form/employer-form.min.js"></script>
    <script src="<?=ROOT?>/js/widgets/line-chart/line-charts-nvd3.min.js"></script>
    <script src="<?=ROOT?>/js/widgets/map/maps.min.js"></script>
    <script src="<?=ROOT?>/js/widgets/pie-chart/pie-charts-nvd3.min.js"></script>
    <script src="<?=ROOT?>/js/widgets/table/table.min.js"></script>
    <script src="<?=ROOT?>/js/widgets/todo/todo.min.js"></script>
    <script src="<?=ROOT?>/js/Colletor.js"></script>
    <!-- endinject -->
</body>
</html>