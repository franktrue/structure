<?php
/*
 * @Description: 单链表
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-16 13:32:57
 * @LastEditTime: 2021-07-16 13:41:51
 */
namespace algorithm\LinkedList;

class SingleNode
{
    /**
     * 节点内容
     *
     * @var object
     */
    private $content;

    /**
     * 下一个节点
     *
     * @var SingleNode|null
     */
    private $next = null;

    /**
     * 构造函数
     *
     * @param object $content
     */
    public function __construct($content = null)
    {
        $this->content = $content;
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

    /**
     * Set 节点内容
     *
     * @param  object  $content  节点内容
     *
     * @return  self
     */
    public function setContent(object $content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get 下一个节点
     *
     * @return  SingleNode|null
     */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * Set 下一个节点
     *
     * @param  SingleNode|null  $next  下一个节点
     *
     * @return  self
     */
    public function setNext($next)
    {
        $this->next = $next;

        return $this;
    }
}
