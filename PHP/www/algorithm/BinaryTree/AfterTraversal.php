<?php
/*
 * @Description: 后序遍历
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-16 16:51:38
 * @LastEditTime: 2021-07-16 17:41:45
 */
namespace algorithm\BinaryTree;

use algorithm\BinaryTree\AbstractTraversal;
use algorithm\BinaryTree\TreeNode;

class AfterTraversal extends AbstractTraversal
{
    public function order($root, array& $arr): void
    {
        if (is_null($root)) {
            return;
        }
        $this->order($root->getLeft(), $arr);
        $this->order($root->getRight(), $arr);
        $arr[] = $root->getContent();
    }
}
