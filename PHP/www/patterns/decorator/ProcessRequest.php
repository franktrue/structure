<?php
namespace decorator;

/**
 * 抽象基类
 */
abstract class ProcessRequest
{
    /**
     * 处理函数
     * 
     * @param Request $req
     */
    abstract public function process(Request $req);
}