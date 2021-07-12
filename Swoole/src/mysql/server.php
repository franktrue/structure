<?php
/*
 * @Description: 使用Mysql池链接数据库，节省创建链接和销毁链接的时间
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-12 08:38:50
 * @LastEditTime: 2021-07-12 09:42:01
 */
require_once "./MysqlPool.php";

$server = new Swoole\Http\Server("0.0.0.0", 9501);
$server->set([
    'worker_num' => 1
]);

$server->on('WorkerStart', function ($request, $response) {
    echo "WorkerStart \n";
    /**
     * 初始化数据链接池
     */
    MysqlPool::getInstance()->init()->recycleFreeConnection();
});

$server->on('Request', function ($request, $response) {
    echo "Request \n";
    $mysql = MysqlPool::getInstance();
    $conn = $mysql->getConn();
    echo "Mysql connect count: " . $mysql->getCount() . "\n";
    $res = $conn->query('select sleep(1)');
    var_dump($res);
    $mysql->recycle($conn);
});

$server->start();
