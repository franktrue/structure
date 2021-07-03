<?php
/**
 * 某些模式的骗术
 * 
 * 单例+抽象工厂
 * 
 * AppConfig是一个标准单例。
 * 因此，我们可以在系统中任何地方得到AppConfig实例，并且确保得到同一个。、
 * 由于在AppConfig中init方法只运行一次，所以唯一的OsFactoryAbstract实例。
 */
// 注册自加载
spl_autoload_register(function ($class) {
    require_once dirname($_SERVER['SCRIPT_FILENAME']) . "//..//" . str_replace("\\", "/", $class) . ".php";
});

use factoryAbstract\AppConfig;

// 初始化配置
$appConfig = AppConfig::getInstance();
$osFactory = $appConfig->getOsFactory();
$border = $osFactory->createBorder();
$border->size();

$button = $osFactory->createButton();
$button->shape();

$font = $osFactory->createFont();
$font->color();