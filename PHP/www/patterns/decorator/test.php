<?php
/**
 * 结构模式-装饰器
 * 
 * Pipeline及中间件等逻辑实现就是依据装饰器模式
 * 
 * 本例使用Web请求示例，开发一个具有可配置管道的模型
 * 类似Laravel的Middleware 
 */

/**
 * 注册自加载
 */
spl_autoload_register(function($class) {
    require_once dirname($_SERVER['SCRIPT_FILENAME']) . "//..//" . str_replace("\\", "/", $class) . ".php";
});

/************************************* test *************************************/
use decorator\AuthenticateRequest;
use decorator\StructureRequest;
use decorator\LogRequest;
use decorator\MainRequest;
use decorator\Request;

$pipeline = new AuthenticateRequest(new StructureRequest(new LogRequest(new MainRequest)));

$pipeline->process(new Request);