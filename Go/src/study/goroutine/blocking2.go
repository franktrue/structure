/*
 * @Description: 协程休眠-死锁
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-21 16:23:40
 * @LastEditTime: 2021-07-21 16:40:18
 */
 package main

 import (
	 "fmt"
	//  "time"
 )
 
 func sum(s []int, in chan int) {
	 sum := 0
	 for _, v := range s {
		 sum += v
	 } 
	 in <- sum
 }
 
 func main() {
	 ch := make(chan int)
	 s := []int{1, 2, 3, 4}
	 go sum(s, ch)
	 total := <- ch
	 fmt.Println(total)
 }