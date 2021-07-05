<?php

$server = new Swoole\Http\Server("0.0.0.0", 9501);

$server->on("Request", function ($request, $response) {
    $response->header("Content-type", "text/html; charset=utf-8");
    $response->end("<h1>Hello Swoole. #" . rand(1000, 9999) . "</h1>");
});

$server->start();
