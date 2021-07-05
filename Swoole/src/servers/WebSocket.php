<?php

$ws = new Swoole\WebSocket\Server("0.0.0.0", 9501);

$ws->on("Open", function ($ws, $request) {
    $ws->push($request->fd, "hello, welcome\n");
});

$ws->on("Message", function ($ws, $frame) {
    echo "Message: {$frame->data}\n";
    $ws->push($frame->fd, "server: {$frame->data}");
});

$ws->on("Request", function ($request, $response) {
    $response->header("Content-type", "text/html; charset=utf-8");
    $response->end("<h1>Hello Swoole. #" . rand(1000, 9999) . "</h1>");
});

$ws->on("Close", function ($ws, $fd) {
    echo "client-{$fd} is closed\n";
});

$ws->start();
