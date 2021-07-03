<?php
namespace factoryAbstract;

/**
 * Mac系统工厂
 */
class MacOsFactory extends OsAbstractFactory
{
    public function createButton()
    {
        return new MacButton();
    }

    public function createBorder()
    {
        return new MacBorder();
    }

    public function createFont()
    {
        return new MacFont();
    }
}
