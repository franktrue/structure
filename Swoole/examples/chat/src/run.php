<?php

require './vendor/autoload.php';

$ws = new \Chat\WebSocketServer();

$ws->run();
