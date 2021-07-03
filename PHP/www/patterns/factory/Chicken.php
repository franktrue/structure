<?php
namespace factory;

/**
 * 实体鸡
 */
class Chicken extends Animal
{
    /**
     * 构造函数
     */
    public function __construct()
    {
        echo "生产一只鸡 \n";
    }

    /**
     * 生命时间
     * 
     * return void
     */
    public function life()
    {
        echo "1年生命";
    }
}