<?php
namespace composite;

/**
 * 抽象接口
 * 
 * 菜单抽象
 */
abstract class Item
{
    /**
     * 名称
     * 
     * @var string
     */
    protected $name;

    /**
     * 层级
     * 
     * @var int
     */
    protected $level;

    /**
     * 构造函数
     */
    public function __construct($name, $level = 0)
    {
        $this->name = $name;
        $this->level = $level;
    }

    /**
     * 添加子节点
     * 
     * @throw \Exception
     */
    public function addItem(Iitem $item)
    {
        throw new \Exception(get_class($this) . " is a leaf menu");
    }

    /**
     * 移除子节点
     * 
     * @throw \Exception
     */
    public function removeItem(Item $item)
    {
        throw new \Exception(get_class($this) . " is a leaf menu");
    }

    /**
     * 打印菜单tree结构
     * 
     * 仅在php-cli模式下可见
     */
    abstract public function tree();
}