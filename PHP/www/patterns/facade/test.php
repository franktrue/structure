<?php
/**
 * 结构型模式-外观
 * 
 * 我的理解就是类似接口形式的暴露系统或某个层面的功能，这样无论系统内部如何修改，从外面看都是不变的
 * 
 * 为一个分层或子系统创建一个单一的入口。
 * 可以和Laravel中的Facade横向对比
 */

require_once "SystemFacade.php";

$facade = new SystemFacade("./test.txt");
var_dump($facade->getProducts());
