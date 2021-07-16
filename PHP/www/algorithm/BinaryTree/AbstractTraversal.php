<?php
namespace algorithm\BinaryTree;

use algorithm\BinaryTree\TreeNode;

abstract class AbstractTraversal
{
    public function run(TreeNode $root): array
    {
        $arr = [];
        $this->order($root, $arr);
        return $arr;
    }

    abstract public function order($root, array& $arr): void;
}
