<?php
namespace singleton;

/**
 * 单例模式
 *
 */
class singleton
{
    /**
     * 自身实例
     *
     * @var object
     */
    private static $instance;

    /**
     * 构造函数
     *
     * 私有化，防止外部通过构造函数初始化
     */
    private function __construct()
    {
        echo "触发构造函数 \n";
    }

    /**
     * 获取实例
     *
     * return object
     */
    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * 测试函数
     *
     * return void
     */
    public function test()
    {
        echo "测试函数 \n";
    }
}
