<?php
/*
 * @Description: Mysql链接池
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-12 07:49:57
 * @LastEditTime: 2021-07-12 09:20:25
 */

use Swoole\Coroutine\Channel;
use Swoole\Coroutine\MySQL;
use Swoole\Timer;

class MysqlPool
{
    /**
     * 最小链接数
     *
     * @var int
     */
    private $min;

    /**
     * 最大链接数
     *
     * @var int
     */
    private $max;

    /**
     * 已连接数
     *
     * @var int
     */
    private $count = 0;

    /**
     * 用于空闲链接判断，周期时间（s）
     *
     * @var int
     */
    private $freeTime;

    /**
     * 链接池
     *
     * @var Channel
     */
    private $connections;

    /**
     * 单例
     *
     * @var self
     */
    private static $instance;

    private function __construct()
    {
        $this->min = 10;
        $this->max = 100;
        $this->freeTime = 2 * 3600;
        $this->connections = new Channel($this->max+1);
    }

    /**
     * 获取单例对象
     *
     * @return self
     */
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * 创建链接
     *
     * @return array|null
     */
    public function createConnection()
    {
        $conn = new MySQL();
        $conn->connect([
            'host'     => 'mysql',
            'port'     => 3306,
            'user'     => 'root',
            'password' => '123456',
            'database' => 'test',
        ]);
        return $conn;
    }

    /**
     * 创建链接对象
     *
     * @return array|null
     */
    public function createConnObject()
    {
        $conn = $this->createConnection();
        return $conn?['last_used_time' => time(), 'conn' => $conn] : null;
    }

    /**
     * 初始化
     *
     * @return self
     */
    public function init()
    {
        for ($i=0;$i < $this->min;$i++) {
            $obj = $this->createConnObject();
            $this->connections->push($obj);
            $this->count++;
        }
        return $this;
    }

    /**
     * 已链接数
     *
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * 获取链接
     *
     * @param int $timeOut
     * @return mixed
     */
    public function getConn($timeOut = 3)
    {
        if ($this->connections->isEmpty()) {
            if ($this->count < $this->max) {
                $obj = $this->createConnObject();
                $this->count++;
            } else {
                $obj = $this->connections->pop($timeOut);
            }
        } else {
            $obj = $this->connections->pop($timeOut);
        }
        return $obj['conn']->connected?$obj['conn']:$this->getConn($timeOut);
    }

    /**
     * 回收链接
     *
     * @return void
     */
    public function recycle($conn)
    {
        if ($conn->connected) {
            $this->connections->push(['last_used_time' => time(), 'conn' => $conn]);
        }
    }

    /**
     * 回收空闲链接
     *
     * @return void
     */
    public function recycleFreeConnection()
    {
        /**
         * 每两分钟检测一次
         */
        Timer::tick(2 * 60 * 1000, function () {
            // 请求连接数还比较多，暂时不回收空闲连接
            if ($this->connections->length() < intval($this->max * 0.5)) {
                return;
            }

            while (true) {
                if ($this->connections->isEmpty()) {
                    break;
                }
                $connObj = $this->connections->pop(0.01);
                $nowTime = time();
                $lastUsedTime = $connObj['last_used_time'];
                if ($this->count > $this->min && ($nowTime->$lastUsedTime) > $this->freeTime) {
                    $connObj['conn']->close();
                    $this->count--;
                    echo "Close conn \n";
                } else {
                    $this->connections->push($connObj);
                }
            }
        });
    }
}
