<?php
namespace decorator;

/**
 * 在Pipeline中被处理的Http请求
 */
class Request
{
    public function __construct()
    {
        echo "发起Http Request请求 \n";
    }
}