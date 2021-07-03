<?php
namespace factory;

/**
 * 孔雀实体
 */
class Peacock extends Animal
{
    /**
     * 构造函数
     */
    public function __construct()
    {
        echo "生产一只孔雀 \n";
    }

    /**
     * 生命时间
     * 
     * return void
     */
    public function life()
    {
        echo "5年生命";
    }
}