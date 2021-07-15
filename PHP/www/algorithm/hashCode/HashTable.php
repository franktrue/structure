<?php
/*
 * @Description: 散列表实现
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-15 08:56:55
 * @LastEditTime: 2021-07-15 09:50:38
 */
namespace algorithm\hashCode;

use SplFixedArray;

/**
 * 散列过程主要分为两步
 * 1. 通过散列函数计算记录的散列地址，并按此散列地址存储该记录。
 * 就好比麻辣鱼我们就让它在川菜区，糖醋鱼，我们就让它在鲁菜区。
 * 但是我们需要注意的是，无论什么记录我们都需要用同一个散列函数计算地址，再存储。
 *
 * 2. 当我们查找时，我们通过同样的散列函数计算记录的散列地址，
 * 按此散列地址访问该记录。因为我们存和取得时候用的都是一个散列函数，因此结果肯定相同。
 *
 * 存储位置 = f (关键字)
 *
 * $key 为我们需要存储的值，$index 为找到的hash表的地址
 *
 * @class HashTable
 */
class HashTable
{
    /**
     * 散列表存储数据数组
     *
     * @var SplFixedArray
     */
    private $elem;

    /**
     * 散列表已存储数据数量
     *
     * @var int
     */
    private $count = 0;


    /**
     * 散列表的最大容量
     *
     * @var int
     */
    private $size;

    /**
     * 构造函数
     *
     * @param int $size
     *
     * @return void
     */
    public function __construct(int $size)
    {
        $this->size = $size;

        /**
         * SplFixedArray默认数组初始值为NULL
         */
        $this->elem = new SplFixedArray($size);
    }

    /**
     * 插入
     *
     * @param int $key
     *
     * @return void
     */
    public function insertHash(int $key): void
    {
        if ($this->count === $this->size) {
            return;
        }
        // 获取索引（除数散列法）
        $index = $key % $this->size;
        // 线性探索
        while (isset($this->elem[$index])) {
            $index = ($index + 1) % $this->size;
        }
        $this->elem[$index] = $key;

        $this->count++;
    }

    /**
     * 查找索引
     *
     * @param int $key
     *
     * @return int|null
     */
    public function searchHash(int $key): ?int
    {
        $index = $key % $this->size;

        while ($this->elem[$index] !== $key) {
            $index = ($index + 1) % $this->size;

            // 散列地址为初始值（NULL）或循环一圈后回到原来的位置，说明不存在索引
            if ($this->elem[$index] === null || $index === $key % $this->size) {
                return null;
            }
        }
        return $index;
    }
}
