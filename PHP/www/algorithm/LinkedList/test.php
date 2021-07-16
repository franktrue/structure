<?php
require_once '../../autoload.php';

use algorithm\LinkedList\SingleNode;

$first = new SingleNode("first");
$second = new SingleNode("second");
$third = new SingleNode("third");

$first->setNext($second);
$second->setNext($third);

echo "--------打印链表1--------\n";
for ($node = $first; !is_null($node); $node = $node->getNext()) {
    echo $node->getContent() . "\n";
}

echo "--------打印链表2--------\n";
$node = $first;
do {
    echo $node->getContent() . "\n";
    $node = $node->getNext();
} while (!is_null($node));
