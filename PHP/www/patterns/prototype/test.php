<?php
/**
 * 创建型模式-原型
 * 
 * 用于创建对象成本过高时（通过clone复用）
 * 
 * 初始化时生成具体的实例，通过clone（深复制）生成新实例，修改原始实例即可全部修改
 * 并且可以随机组合
 */

// 注册自加载
spl_autoload_register(function($class){
    require_once dirname($_SERVER['SCRIPT_FILENAME']) . "//..//" . str_replace("\\", "/", $class) . ".php";
});

use prototype\OsPrototype;

echo "生产Mac \n";
// 修改初始实例，生产的新实例都会更改
$macOsFactory = new OsPrototype(new prototype\MacBorder(), new prototype\MacButton("-new"), new prototype\MacFont);
$macBorder = $macOsFactory->createBorder();
$macBorder->size();

$macButton = $macOsFactory->createButton();
$macButton->shape();

$macFont = $macOsFactory->createFont();
$macFont->color();

echo "生产Win \n";
$winOsFactory = new OsPrototype(new prototype\WinBorder, new prototype\WinButton, new prototype\WinFont);
$winBorder = $winOsFactory->createBorder();
$winBorder->size();

$winButton = $winOsFactory->createButton();
$winButton->shape();

$winFont = $winOsFactory->createFont();
$winFont->color();

echo "生产新系统mac-win混合 \n";
$osFactory = new OsPrototype(new prototype\WinBorder, new prototype\MacButton, new prototype\MacFont);
$border = $osFactory->createBorder();
$border->size();

$button = $osFactory->createButton();
$button->shape();

$font = $osFactory->createFont();
$font->color();