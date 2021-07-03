<?php
/**
 * 创建型模式-单例
 *
 * 业务场景：
 * 常用于配置信息对象，实现一个生命周期中只有一个全局配置对象
 * 
 * 定义：
 * 单例模式（Singleton），也叫单子模式，是一种常用的软件设计模式。
 * 在应用这个模式时，单例对象的类必须保证只有一个实例存在。
 * 许多时候整个系统只需要拥有一个的全局对象，这样有利于我们协调系统整体的行为。
 *
 * 实现思路：
 * 1. 一个类能返回对象一个引用(永远是同一个)和一个获得该实例的方法（必须是静态方法，通常使用getInstance这个名 称）；
 * 2. 调用这个方法时，如果类持有的引用不为空就返回这个引用，如果类保持的引用为空就创建该类的实例并将实例的引用赋予该类保持的引用；
 * 3. 将该类的构造函数定义为私有方法，这样其他处的代码就无法通过调用该类的构造函数来实例化该类的对象，只有通过该类提供的静态方法来得到该类的唯一实例。
 */

 // 注册自加载
function autoload($class)
{
    require_once dirname($_SERVER['SCRIPT_FILENAME']) . '//..//' . str_replace('\\', '/', $class) . '.php';
}

spl_autoload_register('autoload');

/************************************* test *************************************/
use singleton\Singleton;

// 获得单例
$instance = Singleton::getInstance();
$instance->test();

// 使用构造函数初始化
try {
    $instance2 = new Singleton;
    $instance2->test();
} catch (\ErrorException $errorException) {
    // 捕获错误异常
    echo 'ErrorException: ' . $errorException . PHP_EOL;
} catch (\Exception $exception) {
    // 捕获异常
    echo 'Exception: ' . $exception . PHP_EOL;
} catch (\Error $error) {
    // 基本错误
    echo 'Error: ' . $error . PHP_EOL;
}
