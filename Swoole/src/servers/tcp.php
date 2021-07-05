<?php
/*
 * @Description: Swoole - tcp
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-06-29 14:25:14
 * @LastEditTime: 2021-07-05 13:49:26
 */

$server = new Swoole\Server("0.0.0.0", "9501", SWOOLE_PROCESS);

$server->set(array(
    'reactor_num'   => 2,       // 设置启动的 Reactor 线程数。【默认值：CPU 核数】
    'worker_num'    => 4,       // 设置启动的 Worker 进程数。【默认值：CPU 核数】
    'backlog'       => 128,     // listen backlog
    'max_request'   => 50,      // 设置 worker 进程的最大任务数。【默认值：0 即不会退出进程】
    'dispatch_mode' => 1,
    'max_conn'      => 1048576,       // 服务器程序，最大允许的连接数。【默认值：ulimit -n】
));


$server->on("Connect", function ($server, $fd) {
    echo "Client: Connect! \n";
});

$server->on("Receive", function ($server, $fd, $reactor_id, $data) {
    echo "fd:" . $fd . "\n";
    echo "reactor_id:" . $reactor_id . "\n";
    echo "data:" . $data;
    $server->send($fd, "Server: {$data}");
});

$server->on("Close", function ($server, $fd) {
    echo "Client: Close! \n";
});

$server->start();
