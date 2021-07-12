<?php
/*
 * @Description: 每次请求创建MYSQL链接，请求结束断开链接
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-12 09:26:23
 * @LastEditTime: 2021-07-12 15:19:28
 */

$server = new Swoole\Http\Server("0.0.0.0", 9501);
$server->set([
    'worker_num' => 1
]);

$server->on('WorkerStart', function ($request, $response) {
    echo "WorkerStart \n";
});

$server->on('Request', function ($request, $response) {
    echo "Request \n";
    /**
     * 初始化数据链接池
     */
    // $conn = new Swoole\Coroutine\MySQL();
    // $conn->connect([
    //     'host'     => 'mysql',
    //     'port'     => 3306,
    //     'user'     => 'root',
    //     'password' => '123456',
    //     'database' => 'test',
    // ]);
    // $res = $conn->query('select sleep(1)');
    // var_dump($res);
    $conn = new mysqli('mysql', 'root', '123456', 'test');
    if ($conn->connect_error) {
        echo "连接失败: " . $conn->connect_error;
    }
    $result = $conn->query('select sleep(1)');
    if ($result->num_rows > 0) {
        // 输出数据
        while ($row = $result->fetch_assoc()) {
            var_dump($row);
        }
    } else {
        echo "0 结果";
    }
    $conn->close();
});

$server->start();
