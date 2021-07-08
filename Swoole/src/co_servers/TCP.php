<?php
/*
 * @Description: 服务端-协程风格 TCP
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-07 08:20:29
 * @LastEditTime: 2021-07-07 09:33:12
 */
use function Swoole\Coroutine\run;

run(function () {
    // 每个进程都监听9501端口
    $server = new Swoole\Coroutine\Server("0.0.0.0", 9501, false);

    Swoole\Process::signal(SIGTERM, function () use ($server) {
        $server->shutdown();
    });

    $server->handle(function (Swoole\Coroutine\Server\Connection $conn) {
        while (true) {
            // 接收数据
            $data = $conn->recv(1);
            if ($data === '' || $data === false) {
                $errCode = swoole_last_error();
                $errMsg = socket_strerror($errCode);
                echo "errCode: {$errCode}, errMsg: {$errMsg}\n";
                $conn->close();
                break;
            }

            $conn->send('receive:'. $data);
            Co::sleep(1);
        }
    });

    $server->start();
});
