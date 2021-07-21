/*
 * @Description: 协程通讯
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-21 15:53:28
 * @LastEditTime: 2021-07-21 16:11:15
 */
package main

import (
	"fmt"
	"time"
)

func main() {
	var ch chan string
	ch = make(chan string)

	go sendData(ch)
	go getData(ch)

	// 主协程不会等待子协程是否执行完毕
	time.Sleep(1e9)
}

func sendData(ch chan string) {
	ch <- "first"
	ch <- "second"
	ch <- "three"
	ch <- "four"
	ch <- "five"
}

func getData(ch chan string) {
	var input string
	// 超过主协程等待时间
	// time.Sleep(1e9)
	for {
		input = <- ch
		fmt.Println(input)
	}
}