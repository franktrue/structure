/*
 * @Description: 通道阻塞
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-21 16:13:08
 * @LastEditTime: 2021-07-21 16:21:45
 */
package main

import (
	"fmt"
	"time"
)

func main() {
	ch := make(chan int)
	go pump(ch)
	go suck(ch)

	time.Sleep(1e9)
}

func pump(ch chan int) {
	for i :=0; i < 100; i++ {
		ch <- i
	}
}

func suck(ch chan int) {
    for {
        fmt.Println(<-ch)
    }
}