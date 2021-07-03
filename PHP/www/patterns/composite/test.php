<?php
/**
 * 结构型模式-组合
 * 
 * 已无限极菜单为例，组合模式适用于单根继承体系
 * 不能很好的在关系数据库保存，但是非常适合使用XML特性持久化
 */

/**
 * 注册自加载
 */
spl_autoload_register(function($class) {
    require_once dirname($_SERVER['SCRIPT_FILENAME']) . "//..//" . str_replace("\\", "/", $class) . ".php";
});

/************************************* test *************************************/

use composite\LeafMenu;
use composite\BranchMenu;

$leaf1 = new LeafMenu("子菜单1", 3);
$leaf2 = new LeafMenu("子菜单2", 3);
$leaf3 = new LeafMenu("子菜单3", 3);

$branch1 = new BranchMenu("二级菜单1", 2);
$branch1->addItem($leaf1);
$branch1->addItem($leaf2);
$branch2 = new BranchMenu("二级菜单2", 2);
$branch2->addItem($leaf3);
$branch3 = new BranchMenu("二级菜单3", 2);

$root = new BranchMenu("顶级菜单", 1);
$root->addItem($branch1);
$root->addItem($branch2);
$root->addItem($branch3);

echo $root->tree();