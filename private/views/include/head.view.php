<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <!-- <link rel="icon" type="image/png" href="images/DB_16х16.png"> -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recyco-HUB</title>
    <link rel="icon" type="image/x-icon" href="<?= ROOT ?>/images/logo.ico" />
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

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,100,700,900' rel='stylesheet'
        type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= ROOT ?>/css/main2.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>var ROOT = '<?=ROOT?>' </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <!-- endinject -->

</head>
<?php
function limitString($inputString, $maxLength)
{
    if (strlen($inputString) > $maxLength) {
        $trimmedString = substr($inputString, 0, $maxLength);
        $trimmedString .= "...";

        return $trimmedString;
    } else {
        return $inputString;
    }
}

function statuscolor($status)
{
    if ($status == "New") {
        return "green";
    }elseif($status == "In_Warehouse"){
        return "#0034ff";
    }elseif($status == "Assigned"){
        return "#ff8c00";
    }elseif($status == 'Sorting'){
        return "green";
    }
    elseif($status == "Sorted"){
        return "blueviolet";
    }
    else {
        return "red";
    }
}
function setActiveTab($a) {
    
    global $activeTab;
    if ($activeTab == $a) {
        return "style='color: green;'";
    } else {
        return "";
    }
}
?>


