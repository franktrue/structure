/*
 * @Description: 字符转和切片
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-18 11:03:04
 * @LastEditTime: 2021-07-18 11:28:16
 */
package main

import "fmt"

func main() {
	s := "hello world!"
	c := []byte(s)
	print(c)
	// byte类型是使用''单引号，与C语言一致
	c[0]  = 'c'
	fmt.Println()
	fmt.Println(string(c))

	res := Compact([]byte("aaa"), []byte("bbbb"))
	print(res)
}

/**
 * 字符串是否相等
 * 0 if a == b, -1 if a < b, 1 if a > b
 */
func Compact(a, b []byte) int {
	for i := 0; i < len(a) && i < len(b); i++ {
		// 不提供任何被判断的值（实际上默认为判断是否为 true）
		switch {
        	case a[i] > b[i]:
            	return 1
        	case a[i] < b[i]:
            	return -1
        }
	}

	// 数组长度可能不同
	switch {
		case len(a) > len(b):
			return 1
		case len(a) < len(b):
			return -1
	}

	// 数组相等
	return 0
}