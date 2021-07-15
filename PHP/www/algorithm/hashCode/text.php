<?php

require_once '../../autoload.php';

use algorithm\hashCode\HashTable;

echo "初始化Hash表 \n";
$hashTable = new HashTable(12);

echo "插入6547到哈希表 \n";
$hashTable->insertHash(6547);

$index1 = $hashTable->searchHash(6547);

echo "6547的索引为{$index1} \n";

$index2 = $hashTable->searchHash(254);

var_dump($index2);
