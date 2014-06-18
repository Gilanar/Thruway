<?php

use AutobahnPHP\ClientSession;
use AutobahnPHP\Connection;

require __DIR__ . '/../../../autoload.php';

$onClose = function ($msg) {
    echo $msg;
};


//$onChallenge = function (ClientSession $session, $method, $extra) {
//    if ($method === "jwt") {
//        return "some token";
//    } else {
//        echo "don't know how to authentication using {$method}";
//    }
//};

$connection = new Connection(
    array(
        "realm" => 'ff',
        "onClose" => $onClose,
//        "onChallenge" => $onChallenge,
        "url" => 'ws://127.0.0.1:9090',
    )
);

$connection->on(
    'open',
    function (ClientSession $session) {

//        // 1) subscribe to a topic
//        $onevent = function ($args) {
//            echo "Event {$args[0]}";
//        };
//        $session->subscribe('com.myapp.hello', $onevent);
//
//        // 2) publish an event
//        $session->publish('com.myapp.hello', array('Hello, world from PHP!!!'));

//        // 3) register a procedure for remoting
//        $add2 = function ($args) {
//            return $args[0] + $args[1];
//        };
//        $session->register('com.myapp.add2', $add2);
//
//
//        // 4) call a remote procedure
        $session->call('com.myapp.add2', array(2, 3))->then(
            function ($res) {
                echo "Result: {$res}";
            }
        );
    }

);

$connection->open();



