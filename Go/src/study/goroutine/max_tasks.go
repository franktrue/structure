/*
 * @Description: 限制并发数
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-22 17:29:15
 * @LastEditTime: 2021-07-22 17:43:14
 */
package main

import (
	"fmt"
	"time"
)

const (
	AvailableMemory = 10 << 20

	AverageMemoryPerRequest = 10 << 10

	MAXREQS = AvailableMemory / AverageMemoryPerRequest 
)

// 最大并发数
var sem = make(chan int, MAXREQS)

type Request struct {
	a, b int
	replyc chan int
}

func process(req *Request) {
	fmt.Printf("开始处理请求%d\n",req.a)
	time.Sleep(2e9)
	fmt.Printf("请求处理完成%d\n",req.a)
}

func handle(req *Request) {
	go process(req)
	// 信号完成：开始启用下一个请求

    // 将 sem 的缓冲区释放一个位置
	<- sem
}

func server(queue chan *Request) {
	for {
		sem <- 1

		// 当通道已满（1000 个请求被激活）的时候将被阻塞

        // 所以停在这里等待，直到 sem 有容量（被释放），才能继续去处理请求

        // (doesn’t matter what we put in it)
		
		request := <- queue

		handle(request)
	}
}

func main() {
	queue := make(chan *Request)
	go server(queue)
	
	const N = 10000

	var reqs [N]Request

	for i := 0; i < N; i++ {

		req := &reqs[i]

		req.a = i

		req.b = i + N

		req.replyc = make(chan int)

		queue <- req
	}
	time.Sleep(10e9)
}