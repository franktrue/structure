<?php
/**
 * 创建型模式-工厂
 * 
 * 通常用于生成同一类（有共同父类）对象
 */

/**
 * 注册自加载
 */
spl_autoload_register(function($class) {
    require_once dirname($_SERVER['SCRIPT_FILENAME']) . "//..//" . str_replace("\\", "/", $class) . ".php";
});

/************************************* test *************************************/
use factory\SampleFactory;
use factory\ZooFactory;
use factory\PoultryFactory;

// 初始化家禽工厂
$poultryFactory = new PoultryFactory;

// 生产家禽
$poultryFactory->produce('chicken');
$poultryFactory->produce('duck');

// 初始化动物园工厂
$zooFactory = new ZooFactory;

// 生产动物
$zooFactory->produce('lion');
$zooFactory->produce('peacock');


// 简单工厂模式
SampleFactory::produce('chicken');
SampleFactory::produce('duck');
SampleFactory::produce('lion');
SampleFactory::produce('peacock');
SampleFactory::produce('human');