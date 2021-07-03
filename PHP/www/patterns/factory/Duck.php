<?php
namespace factory;

/**
 * 鸭子实体
 */
class Duck extends Animal
{
    /**
     * 构造函数
     */
    public function __construct()
    {
        echo "生产一只鸭子 \n";
    }

    /**
     * 生命时间
     * 
     * return void
     */
    public function life()
    {
        echo "2年生命";
    }
}