<?php
/*
 * @Description: 层序遍历
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-16 16:51:38
 * @LastEditTime: 2021-07-16 18:10:25
 */
namespace algorithm\BinaryTree;

use algorithm\BinaryTree\AbstractTraversal;
use algorithm\BinaryTree\TreeNode;
use Ds\Queue;

/**
 * 利用队列先进先出的特性
 * 
 * 该层节点执行出队操作时, 需要将该节点的左孩子节点和右孩子节点进行入队操作
 */
class LayerTraversal extends AbstractTraversal
{
    public function order($root, array& $arr): void
    {
        $queue = new Queue();
        $queue->push($root);
        while(!$queue->isEmpty()) {
            $tmpArr = [];
            $size = $queue->count();
            for($i = 0; $i < $size; $i++) {
                $tempNode = $queue->pop();
                if(!is_null($tempNode->getLeft())) {
                    $queue->push($tempNode->getLeft());
                }
                if(!is_null($tempNode->getRight())) {
                    $queue->push($tempNode->getRight());
                }
                $tmpArr[] = $tempNode->getContent();
            }
            $arr[] = $tmpArr;
        }
    }
}
