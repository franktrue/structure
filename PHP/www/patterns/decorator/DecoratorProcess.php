<?php
namespace decorator;

/**
 * 抽象装饰类
 */
abstract class DecoratorProcess extends ProcessRequest
{
    protected $processRequest;

    /**
     * 构造方法
     */
    public function __construct(ProcessRequest $processRequest)
    {
        $this->processRequest = $processRequest;
    }
}