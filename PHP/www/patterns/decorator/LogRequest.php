<?php
namespace decorator;

/**
 * 日志处理
 */
class LogRequest extends DecoratorProcess
{
    public function process(Request $req)
    {
        echo __CLASS__ . "添加日志记录 \n";
        return $this->processRequest->process($req);
    }
}