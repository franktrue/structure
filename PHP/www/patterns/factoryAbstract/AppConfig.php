<?php
namespace factoryAbstract;

/**
 * 单例+抽象工厂的组合
 */
class AppConfig
{
    private static $instance;

    private $osFactory;

    private function __construct()
    {
        echo "初始化配置 \n";
        $this->init();
    }

    private function init()
    {
        // 从配置项中读取
        switch(Settings::OS) {
            case "mac":
                $this->osFactory = new MacOsFactory();
                break;
            case "win":
                $this->osFactory = new WinOsFactory();
                break;
            default:
                exit("不支持的系统");
        }
    }

    /**
     * 实例化
     * 
     * @return self
     */
    public static function getInstance()
    {
        if(empty(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * 获取工厂
     * 
     * @return OsAbstractFactory
     */
    public function getOsFactory()
    {
        return $this->osFactory;
    }
}