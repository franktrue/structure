<?php
namespace factoryAbstract;

/**
 * Win系统工厂
 */
class WinOsFactory extends OsAbstractFactory
{
    public function createButton()
    {
        return new WinButton();
    }

    public function createBorder()
    {
        return new WinBorder();
    }

    public function createFont()
    {
        return new WinFont();
    }
}
