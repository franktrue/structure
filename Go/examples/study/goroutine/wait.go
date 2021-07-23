/*
 * @Description: sync.WaitGroup
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-23 16:07:15
 * @LastEditTime: 2021-07-23 16:13:10
 */
 // 作用：Goroutine可以等待，直到当前Goroutine派生的子Goroutine执行完成。
package main

import (
	"fmt"
	"sync"
	"time"
)

func main() {
	wg := &sync.WaitGroup{}

	wg.Add(1)
	go func(wg *sync.WaitGroup) {
		defer wg.Done()
		fmt.Println("子a 开始执行")
		time.Sleep(5 * time.Second)
		fmt.Println("子a 执行完毕")
	}(wg)

	wg.Add(1)
	go func(wg *sync.WaitGroup) {
		defer wg.Done()
		fmt.Println("子b 开始执行")
		time.Sleep(5 * time.Second)
		fmt.Println("子b 执行完毕")
	}(wg)

	wg.Add(1)
	go func(wg *sync.WaitGroup) {
		defer wg.Done()
		fmt.Println("子c 开始执行")
		time.Sleep(5 * time.Second)
		fmt.Println("子c 执行完毕")
	}(wg)

	fmt.Println("主 等待")
	wg.Wait()
	fmt.Println("主 退出")
}