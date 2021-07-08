<?php
/*
 * @Description: 服务端-异步风格
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-07 08:15:11
 * @LastEditTime: 2021-07-07 08:15:40
 */

$server = new Swoole\Http\Server("0.0.0.0", 9502);

$server->on("Request", function ($request, $response) {
    Co::sleep(5);
    $response->header("Content-type", "text/html; charset=utf-8");
    $response->end("<h1>Hello Swoole. #" . rand(1000, 9999) . "</h1>");
});

$server->start();
