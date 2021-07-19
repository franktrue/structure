/*
 * @Description: fibonacci 计算斐波那契数列
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-18 09:40:33
 * @LastEditTime: 2021-07-18 09:55:04
 */
package main

func fibonacci(n int) (res int) {
	if n <= 1 {
		res = 1
	} else {
		res = fibonacci(n-2) + fibonacci(n-1)
	}
	return
}

func main() {
	print(fibonacci(20))
}