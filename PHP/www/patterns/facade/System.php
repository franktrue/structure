<?php
/**
 * 以下是一些杂乱无章的代码，为了模拟一个复杂的系统
 */

function getProductFileLines($file)
{
    return file($file);
}

function getProductObjectFormId($id, $productName) 
{
    return new Product($id, $name);
}

function getNameFromLine($line) 
{
    if(preg_match("/.*-(.*)\s\d+/", $line, $array)) {
        return $array[1];
    }
    return -1;
}

function getIDFromLine($line)
{
    if(preg_match("/^(\d{1-3})-/", $line, $array)) {
        return $array[1];
    }
    return -1;
}

class Product
{
    public $id;

    public $name;

    function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}