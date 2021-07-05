<?php

$server =new Swoole\Server("0.0.0.0", 9051, SWOOLE_PROCESS, SWOOLE_SOCK_UDP);

$server->on("Packet", function ($server, $data, $clientInfo) {
    var_dump($clientInfo);
    $server->sendto($clientInfo['address'], $clientInfo['port'], "Server: {$data}");
});

$server->start();
