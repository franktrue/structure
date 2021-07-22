/*
 * @Description: 简单超时模式
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-22 08:58:24
 * @LastEditTime: 2021-07-22 09:25:52
 */
package main

import (
	"fmt"
	"time"
	"math/rand"
)

// 模拟需要等待的程序
func work(ch chan bool) {
	//将时间戳设置成种子数
	rand.Seed(time.Now().UnixNano())
	x := rand.Intn(3)
	fmt.Println(x)

	// 模拟程序耗时
	time.Sleep(time.Duration(x) * time.Second)
	ch <- true
}

func main() {
	ch := make(chan bool)
	// 缓冲大小设置为 1 是必要的，可以避免协程死锁以及确保超时的通道可以被垃圾回收
	timeout := make(chan bool, 1)

	// 需要等待的程序
	go work(ch)

	// 超时计时器
	go func() {
		time.Sleep(1e9)
		timeout <- true
	}()

	select {
	case <- ch:
		fmt.Println("Work Success")
	case <-timeout:
		fmt.Println("Work timeout")
		break
	}
}