<?php
require_once '../../autoload.php';

use algorithm\stackCode\Expression;

$expStr = "9 + ( 3 - 1 ) * 3 + 8 / 2";
echo "中缀表达式为{$expStr} \n";
$result = 9 + (3 - 1) * 3 + 8 / 2;
$exp = new Expression($expStr);

assert($exp->run() === $result);

echo "运行成功，结果为{$result} \n";
