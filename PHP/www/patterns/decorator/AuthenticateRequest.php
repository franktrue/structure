<?php
namespace decorator;

/**
 * 权限验证
 */
class AuthenticateRequest extends DecoratorProcess
{
    public function process(Request $req)
    {
        echo __CLASS__ . "权限验证\n";
        return $this->processRequest->process($req);
    }
}