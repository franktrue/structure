/*
 * @Description: 协程休眠-死锁
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-21 16:23:40
 * @LastEditTime: 2021-07-21 16:46:58
 */
 package main

 import (
	 "fmt"
	 "time"
 )
 
 func f1(in chan int) {
	 fmt.Println(<-in)
 }
 
 func main() {
	 out := make(chan int)
	 // 在主协程中阻塞，没有消费者
	 // 在协程内顺序执行
	 out <- 2
	 go f1(out)
	 time.Sleep(1e9)
 }