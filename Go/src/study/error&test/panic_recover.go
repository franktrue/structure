/*
 * @Description: 从 panic 中恢复（Recover）
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-20 15:28:06
 * @LastEditTime: 2021-07-20 15:32:27
 */
package main

import "fmt"

func badCall() {
	panic("bad end")
}

func test() {
	defer func() {
		if e := recover(); e != nil {
			fmt.Printf("Panicing %s\r\n", e)
		}
	}()
	badCall()
	fmt.Println("After bad call\r\n")
}

func main() {
	fmt.Println("Calling test")
	test()
	fmt.Println("Test completed")
}