<?php

$server = new Swoole\Server('0.0.0.0', 9501);

$server->on('Start', function ($server) {
    echo "OnStart Event".PHP_EOL;
    echo "Master PID:{$server->master_pid}".PHP_EOL;
    echo "Manager PID:{$server->manager_pid}".PHP_EOL;
});

$server->on('Connect', function () {
});
