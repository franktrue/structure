<?php
namespace factoryAbstract;

/**
 * 系统工厂
 */
abstract class OsAbstractFactory
{
    /**
     * 按钮
     */
    abstract public function createButton();

    /**
     * 边框
     */
    abstract public function createBorder();

    /**
     * 字体
     */
    abstract public function createFont();
}
