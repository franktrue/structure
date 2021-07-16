<?php
/*
 * @Description: 二叉树节点
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-16 16:38:10
 * @LastEditTime: 2021-07-16 17:18:35
 */
namespace algorithm\BinaryTree;

class TreeNode
{
    /**
     * 节点内容
     *
     * @var object
     */
    private $content;

    /**
     * 左子树
     *
     * @var TreeNode
     */
    private $left;

    /**
     * 右子树
     *
     * @var TreeNode
     */
    private $right;

    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * Get 左子树
     *
     * @return  TreeNode
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * Set 左子树
     *
     * @param  TreeNode  $left  左子树
     *
     * @return  self
     */
    public function setLeft(TreeNode $left)
    {
        $this->left = $left;

        return $this;
    }

    /**
     * Get 右子树
     *
     * @return  TreeNode
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * Set 右子树
     *
     * @param  TreeNode  $right  右子树
     *
     * @return  self
     */
    public function setRight(TreeNode $right)
    {
        $this->right = $right;

        return $this;
    }

    /**
     * Get 节点内容
     *
     * @return  object
     */
    public function getContent()
    {
        return $this->content;
    }
}
