<?php 

// Controller
use \PhpMqtt\Client\MqttClient;
use \PhpMqtt\Client\ConnectionSettings;
class MqttController {
    private $mqtt;

    public function __construct() {
        $server   = 'cfdcd9bc.ala.asia-southeast1.emqxsl.com';
        $port     = 8883;
        $clientId = rand(5, 15);
        $username = 'lahiruthpala';
        $password = 'Lahiru@28';
        $clean_session = false;

        $connectionSettings  = (new ConnectionSettings)
          ->setUsername($username)
          ->setPassword($password)
          ->setKeepAliveInterval(60)
          ->setConnectTimeout(3)
          ->setUseTls(true)
          ->setTlsSelfSignedAllowed(true);

        $this->mqtt = new MqttClient($server, $port, $clientId, MqttClient::MQTT_3_1_1);
        $this->mqtt->connect($connectionSettings, $clean_session);
    }

    public function subscribe($topic, $callback) {
        $this->mqtt->subscribe($topic, $callback, 0);
    }

    public function publish($topic, $payload) {
        $this->mqtt->publish($topic, $payload, 0);
    }

    public function loop($blocking) {
        $this->mqtt->loop($blocking);
    }

    public function disconnect() {
        $this->mqtt->disconnect();
    }
}
?>