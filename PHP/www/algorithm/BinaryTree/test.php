<?php
require_once '../../autoload.php';

use algorithm\BinaryTree\TreeNode;
use algorithm\BinaryTree\BeforeTraversal;
use algorithm\BinaryTree\MediumTraversal;
use algorithm\BinaryTree\AfterTraversal;
use algorithm\BinaryTree\LayerTraversal;

echo "构建二叉树 \n";
$root = new TreeNode(0);
$node1 = new TreeNode(1);
$node2 = new TreeNode(2);
$node3 = new TreeNode(3);
$node4 = new TreeNode(4);
$node5 = new TreeNode(5);
$node6 = new TreeNode(6);
$node7 = new TreeNode(7);
$node8 = new TreeNode(8);
$node9 = new TreeNode(9);

$root->setLeft($node1);
$root->setRight($node2);
$node1->setLeft($node3);
$node1->setRight($node4);
$node2->setLeft($node5);
$node2->setRight($node6);
$node3->setLeft($node7);
$node3->setRight($node8);
$node4->setLeft($node9);

echo "前序遍历 \n";
$beforeTraversal = new BeforeTraversal();
$arr1 = $beforeTraversal->run($root);
echo implode("-", $arr1) . "\n";

echo "中序遍历 \n";
$mediumTraversal = new MediumTraversal();
$arr2 = $mediumTraversal->run($root);
echo implode("-", $arr2) . "\n";

echo "后序遍历 \n";
$afterTraversal = new AfterTraversal();
$arr3 = $afterTraversal->run($root);
echo implode("-", $arr3) . "\n";

echo "层序遍历 \n";
$layerTraversal = new LayerTraversal();
$arr4 = $layerTraversal->run($root);
var_dump($arr4);