<?php
namespace factory;

/**
 * 家禽工厂
 */
class PoultryFactory implements FactoryInterface
{
    /**
     * 获取名称
     * 
     * @return void
     */
    public function getName()
    {
        echo "家禽 \n";
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
            case "chicken":
                return new Chicken;
                break;
            case "duck":
                return new Duck;
                break;
            default:
                echo "没有这个动物 \n";
                break;
        }
    }
}