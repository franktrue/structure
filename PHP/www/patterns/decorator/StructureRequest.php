<?php
namespace decorator;

/**
 * 结构化数据
 */
class StructureRequest extends DecoratorProcess
{
    public function process(Request $req)
    {
        echo __CLASS__ . "结构化请求数据\n";
        return $this->processRequest->process($req);
    }
}