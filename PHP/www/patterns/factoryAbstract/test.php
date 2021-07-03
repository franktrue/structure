<?php
/**
 * 创建型模式-抽象工厂
 *
 * 说说我理解的工厂模式和抽象工厂模式的区别：
 * 工厂就是一个独立公司，负责生产对象；
 * 抽象工厂就是集团，负责生产子公司（工厂）；
 *
 * 在大型应用中，我们很可能需要工厂来生产一组相关（组合）的类。抽象工厂模式可以解决这个问题。
 *
 * 示例简介：
 * 抽象系统工厂，有Mac和Win两个具体子工厂，分别生产对应系统（包括按钮、边框、字体）
 */

// 注册自加载
spl_autoload_register(function ($class) {
    require_once dirname($_SERVER['SCRIPT_FILENAME']) . "//..//" . str_replace("\\", "/", $class) . ".php";
});

use factoryAbstract\MacOsFactory;
use factoryAbstract\WinOsFactory;

// 生产Mac
echo "生产MAC \n";
$macOsFactory = new MacOsFactory();
$macBorder = $macOsFactory->createBorder();
$macBorder->size();

$macButton = $macOsFactory->createButton();
$macButton->shape();

$macFont = $macOsFactory->createFont();
$macFont->color();

// 生产Win
echo "生产Win \n";
$winOsFactory = new WinOsFactory();
$winBorder = $winOsFactory->createBorder();
$winBorder->size();

$winButton = $winOsFactory->createButton();
$winButton->shape();

$winFont = $winOsFactory->createFont();
$winFont->color();
