<?php
/*
 * @Description: 查找字符串-BF算法
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-17 08:17:07
 * @LastEditTime: 2021-07-17 08:51:30
 */
namespace algorithm\String;

class BruteForce
{
    /**
     * BF
     *
     * @param string $haystack
     * @param string $needle
     *
     * @return int
     */
    public static function strPos1(string $haystack, string $needle): int
    {
        $hLen = strlen($haystack);
        $nLen = strlen($needle);
        
        if ($hLen < $nLen) {
            return -1;
        }

        if ($nLen === 0) {
            return 0;
        }

        for ($i = 0; $i < $hLen-$nLen; $i++) {
            for ($j = 0; $j < $nLen; $j++) {
                if ($haystack[$i+$j] !== $needle[$j]) {
                    break;
                }
            }
            
            // 匹配成功
            if ($j === $nLen) {
                return $i;
            }
        }
        return -1;
    }

    /**
     * BF-显示回退
     *
     * @param string $haystack
     * @param string $needle
     *
     * @return int
     */
    public static function strPos2(string $haystack, string $needle): int
    {
        $hLen = strlen($haystack);
        $nLen = strlen($needle);
        
        for ($i = 0, $j = 0; $i < $hLen && $j < $nLen; $i++) {
            if ($haystack[$i] === $needle[$j]) {
                $j++;
            } else {
                $i -= $j;
                $j = 0;
            }
        }

        return $j === $nLen ? $i-$j: -1;
    }
}
