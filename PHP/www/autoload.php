<?php

/**
 * 注册自加载
 */
spl_autoload_register(function ($class) {
    require_once __DIR__ . "//" . str_replace("\\", "/", $class) . ".php";
});
