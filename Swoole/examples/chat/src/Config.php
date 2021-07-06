<?php
/*
 * @Description: 配置类对象
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-06 09:15:16
 * @LastEditTime: 2021-07-06 11:37:07
 */
namespace Chat;

class Config implements \ArrayAccess
{
    /**
     * 配置文件路径
     *
     * @var string
     */
    private $path;

    /**
     * 配置信息
     *
     * @var array
     */
    private $config;

    /**
     * 实例
     *
     * @var Config
     */
    private static $instance;

    private function __construct()
    {
        $this->path = __DIR__ . '/config/';
    }

    /**
     * 单例模式
     *
     * @return Config
     */
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function offsetSet($offset, $value)
    {
        // 阉割
        // $this->config[$offset] = $value;
    }

    public function offsetGet($offset)
    {
        if (!$this->offsetExists($offset)) {
            $this->config[$offset] = require $this->path . $offset . '.php';
        }
        return $this->config[$offset];
    }

    public function offsetExists($offset)
    {
        return isset($this->config[$offset]);
    }

    public function offsetUnset($offset)
    {
        // 阉割
        // unset($this->config[$offset]);
    }

    /**
     * 禁止克隆
     */
    final public function __clone()
    {
    }
}
