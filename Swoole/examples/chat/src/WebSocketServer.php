<?php
/*
 * @Description: WebSocket服务器-内存型
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-06 09:48:24
 * @LastEditTime: 2021-07-06 11:57:25
 */
namespace Chat;

class WebSocketServer
{
    private $config;

    private $table;

    private $server;

    /**
     * 构造函数
     *
     * 初始化数据表和配置信息
     */
    public function __construct()
    {
        $this->table = $this->createTable();

        $this->config = Config::getInstance();
    }

    /**
     * 启动函数
     */
    public function run()
    {
        $this->server = new \Swoole\WebSocket\Server(
            $this->config['socket']['host'],
            $this->config['socket']['port']
        );

        $this->server->on('open', [$this, 'open']);
        $this->server->on('message', [$this, 'message']);
        $this->server->on('close', [$this, 'close']);
        
        $this->server->start();
    }

    /**
     * WebSocket open事件回调函数
     *
     * @param \Swoole\WebSocket\Server $server
     * @param \Swoole\WebSocket\Request $request
     * @return void
     */
    public function open(\Swoole\WebSocket\Server $server, \Swoole\Http\Request $request)
    {
        $user = [
            'fd' => $request->fd,
            'name' => $this->config['socket']['name'][array_rand($this->config['socket']['name'])] . $request->fd,
            'avatar' => $this->config['socket']['avatar'][array_rand($this->config['socket']['avatar'])]
        ];

        $this->table->set($request->fd, $user);

        $server->push(
            $request->fd,
            json_encode([
                'user' => $user,
                'all' => $this->allUser(),
                'type' => 'openSuccess'
            ])
        );
    }

    /**
     * 获取所有用户
     *
     * @return array
     */
    private function allUser()
    {
        $users = [];
        foreach ($this->table as $row) {
            $users[] = $row;
        }
        return $users;
    }

    /**
     * WebSocket message事件回调函数
     *
     * @param \Swoole\WebSocket\Server $server
     * @param \Swoole\WebSocket\Frame $frame
     * @return void
     */
    public function message(\Swoole\WebSocket\Server $server, \Swoole\WebSocket\Frame $frame)
    {
        $this->pushMessage($server, $frame->data, 'message', $frame->fd);
    }

    /**
     * 消息推送
     *
     * @param \Swoole\WebSocket\Server $server
     * @param string $message
     * @param string $type
     * @param int $fd
     * @return void
     */
    private function pushMessage(\Swoole\WebSocket\Server $server, string $message, string $type, int $fd)
    {
        $message = htmlspecialchars($message);
        $datetime = date('Y-m-d H:i:s');
        $user = $this->table->get($fd);
        
        foreach ($this->table as $item) {
            // 不用发给自己
            if ($fd == $item['fd']) {
                continue;
            }

            $server->push(
                $item['fd'],
                json_encode(compact('type', 'message', 'datetime', 'user'))
            );
        }
    }


    /**
     * WebSocket close事件回调函数
     *
     * @param \Swoole\WebSocket\Server $server
     * @param int $fd
     */
    public function close(\Swoole\WebSocket\Server $server, int $fd)
    {
        $user = $this->table->get($fd);
        $this->pushMessage($server, "{$user['name']}离开聊天室", 'close', $fd);
        $this->table->del($fd);
    }

    /**
     * 创建用户内存表
     *
     * @return \Swoole\Table
     */
    public function createTable()
    {
        $table = new \Swoole\Table(1024);
        $table->column('fd', \Swoole\Table::TYPE_INT);
        $table->column('name', \Swoole\Table::TYPE_STRING, 255);
        $table->column('avatar', \Swoole\Table::TYPE_STRING, 255);
        $table->create();
        return $table;
    }
}
