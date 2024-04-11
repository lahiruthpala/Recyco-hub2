<?php
class Machine extends Controller
{

    function index()
    {
        die;
        // Example usage
        $mqttController = new MqttController();

        // Subscribe to a topic
        $mqttController->subscribe('Recycohub', function ($topic, $message) {
            printf("Received message on topic [%s]: %s\n", $topic, $message);
        });

        // Publish to a topic
        $payload = array(
            'protocol' => 'tls',
            'date' => date('Y-m-d H:i:s'),
            'url' => 'https://github.com/emqx/MQTT-Client-Examples'
        );
        $mqttController->publish('Recycohub', json_encode($payload));

        // Loop to keep listening
        $mqttController->loop(true);
    }
}
?>