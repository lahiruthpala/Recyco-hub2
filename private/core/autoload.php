<?php

require_once __DIR__ . '/../../vendor/autoload.php'; // Load Composer's autoloader
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
require "Auth.php";
require "config.php";
require "helper.php";
require "database.php";
require "controller.php";
require "model.php";
require "app.php";
require "MQTTController.php";