<?php
namespace prototype;

/**
 * OS原型模式
 */
class OsPrototype
{
    private $border;

    private $button;

    private $font;

    public function __construct(BorderInterface $border, ButtonInterface $button, FontInterface $font)
    {
        $this->border = $border;
        $this->button = $button;
        $this->font = $font;
    }

    public function createBorder()
    {
        return clone $this->border;
    }

    public function createButton()
    {
        return clone $this->button;
    }

    public function createFont()
    {
        return clone $this->font;
    }
}