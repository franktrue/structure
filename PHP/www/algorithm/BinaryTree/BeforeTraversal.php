<?php
/*
 * @Description: 前序遍历
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-16 16:51:38
 * @LastEditTime: 2021-07-16 17:32:21
 */
namespace algorithm\BinaryTree;

use algorithm\BinaryTree\AbstractTraversal;
use algorithm\BinaryTree\TreeNode;

class BeforeTraversal extends AbstractTraversal
{
    public function order($root, array& $arr): void
    {
        if (is_null($root)) {
            return;
        }
        $arr[] = $root->getContent();
        $this->order($root->getLeft(), $arr);
        $this->order($root->getRight(), $arr);
    }
}
