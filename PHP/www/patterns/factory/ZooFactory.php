<?php
namespace factory;

/**
 * 动物园工厂
 */
class ZooFactory implements FactoryInterface
{
    /**
     * 获取名称
     * 
     * @return void
     */
    public function getName()
    {
        echo "动物园 \n";
    }

    /**
     * 工厂方法
     * 
     * @param string $type
     * 
     * @return object|string
     */
    public function produce($type)
    {
        switch($type) {
            case "lion":
                return new Lion;
                break;
            case "peacock":
                return new Peacock;
                break;
            default:
                echo "没有这个动物 \n";
                break;
        }
    }
}