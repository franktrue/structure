/*
 * @Description: select伪随机问题
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-22 09:31:32
 * @LastEditTime: 2021-07-22 09:40:55
 */
package main

import (
	"time"
	"fmt"
)

func main() {
	ch := make(chan int, 1)
	go func() { 
		for { ch <- 1 } 
	} ()
	L:
	for {
		// 伪随机
		select {
		case v := <-ch:
			fmt.Println(v)
		case <-time.After(1e9):
			fmt.Println("Timeout")
			break L
		}
	}
}