<?php
namespace factory;

/**
 * 工厂接口
 */
interface FactoryInterface
{
    /**
     * 获取名称
     * 
     * 利用对象多态属性，来解决条件语句蔓延问题
     */
    public function getName();

    /**
     * 工厂方法
     * 
     * @param string $type
     */
    public function produce($type);

    /**
     * 获取寿命
     */
    public function getLife();
}