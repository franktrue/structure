<?php
/*
 * @Description: 服务端-异步风格
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-07 07:34:46
 * @LastEditTime: 2021-07-07 08:11:04
 */

$server = new Swoole\Server("0.0.0.0", 9501);

$server->on("connect", function ($server, $fd) {
    echo "Connect \n";
    $redis = new Redis();
    $redis->connect("redis", 6379);
    Co::sleep(5);
    $redis->set($fd, "fd {$fd} connected");
});

$server->on('receive', function ($server, $fd, $reactor_id, $data) {
    echo "Receive \n";
    $redis = new Redis();
    $redis->connect("redis", 6379);//此处onReceive的协程会挂起
    var_dump($redis->get($fd));//有可能onReceive的协程的redis连接先建立好了，上面的set还没有执行，此处get会是false，产生逻辑错误
});

$server->on('close', function ($server, $fd) {
    $server->send($fd, "Close");
    echo "Close.\n";
});

$server->start();
