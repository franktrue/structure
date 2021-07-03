<?php
namespace decorator;

/**
 * 具体组件
 */
class MainRequest extends ProcessRequest
{
    public function process(Request $req)
    {
        echo __CLASS__ . "操作Request对象\n";
        return $req;
    }
}