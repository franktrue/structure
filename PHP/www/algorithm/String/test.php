<?php
require_once '../../autoload.php';

use algorithm\String\BruteForce;

echo "BF算法 \n";
$result1 = BruteForce::strPos1('hello', 'll');
assert($result1 === 2);
echo "查询成功，位置为：{$result1} \n";

$result2 = BruteForce::strPos1('hello', 'aaa');
assert($result2 === -1);

echo "查询成功，未找到：{$result2} \n";

$result3 = BruteForce::strPos2('hello', 'l');
assert($result3 === 2);
echo "查询成功，位置为：{$result3} \n";

$result4 = BruteForce::strPos2('hello', 'aaa');
assert($result4 === -1);
echo "查询成功，未找到：{$result4} \n";
