<?php

require (__DIR__.'/vendor/autoload.php');

use \PhpMqtt\Client\MqttClient;
use \PhpMqtt\Client\ConnectionSettings;

$server = 'xf6e8811.ala.asia-southeast1.emqxsl.com';
// TLS port
$port = 8883;
$clientId = rand(5, 15);
$username = 'lahiruthpala';
$password = 'Lahiru@28';
$clean_session = false;

$connectionSettings = (new ConnectionSettings)
    ->setUsername($username)
    ->setPassword($password)
    ->setKeepAliveInterval(60)
    ->setConnectTimeout(3)
    ->setUseTls(true)
    ->setTlsSelfSignedAllowed(true);

$mqtt = new MqttClient($server, $port, $clientId, MqttClient::MQTT_3_1_1);

$mqtt->connect($connectionSettings, $clean_session);

$mqtt->subscribe('Recycohub', function ($topic, $message) {

    printf("\n\n\n\n\n\n\nReceived message on topic [%s]: %s\n", $topic, $message);
    if ($message == "Connected") {
        printf("Received message on topic [%s]: %s\n", $topic, $message);
    } else {
        // URL to which you want to send the POST request
        $url = 'http://localhost:8380/Recyco-hub2/public/Machine';

        // Data to be sent in the POST request
        $data = array (
            'topic' => $topic,
            'message' => $message
        );

        // Initialize cURL session
        $curl = curl_init();

        // Set cURL options
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL request
        $response = curl_exec($curl);

        // Close cURL session
        curl_close($curl);

        // Handle response
        echo $response;
        printf("\nReceived message on topic [%s]: %s\n", $topic, $message);
        // Write message and topic to a log file
        $logFilePath = '/var/www/html/Recyco-hub2/MQTTClient.log';
        $logMessage = sprintf("[%s] Topic: %s, Message: %s, Response:%s\n", date('Y-m-d H:i:s'), $topic, $message, $response);
        file_put_contents($logFilePath, $logMessage, FILE_APPEND);
    }
}, 0);

$mqtt->loop(true);
