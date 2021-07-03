<?php
namespace factory;

/**
 * 狮子实体
 */
class Lion extends Animal
{
    /**
     * 构造函数
     */
    public function __construct()
    {
        echo "生产一只狮子 \n";
    }

    /**
     * 生命时间
     * 
     * return void
     */
    public function life()
    {
        echo "20年生命";
    }
}