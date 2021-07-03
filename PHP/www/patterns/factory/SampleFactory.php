<?php
namespace factory;

/**
 * 工厂模式
 * 
 * 
 */
class SampleFactory
{
    /**
     * 工厂方法
     * 
     * @param string $type
     * 
     * @return object|string
     */
    public static function produce($type)
    {
        switch($type) {
            case "chicken":
                return new Chicken;
                break;
            case "duck":
                return new Duck;
                break;
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
