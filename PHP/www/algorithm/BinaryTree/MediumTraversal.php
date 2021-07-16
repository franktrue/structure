<?php
/*
 * @Description: 中序遍历
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-16 16:51:38
 * @LastEditTime: 2021-07-16 17:41:04
 */
namespace algorithm\BinaryTree;

use algorithm\BinaryTree\AbstractTraversal;
use algorithm\BinaryTree\TreeNode;

class MediumTraversal extends AbstractTraversal
{
    public function order($root, array& $arr): void
    {
        if (is_null($root)) {
            return;
        }
        $this->order($root->getLeft(), $arr);
        $arr[] = $root->getContent();
        $this->order($root->getRight(), $arr);
    }
}
