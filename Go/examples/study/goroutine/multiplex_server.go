/*
 * @Description: client-server
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-22 13:06:32
 * @LastEditTime: 2021-07-22 16:55:22
 */
package main

import "fmt"

type Request struct {
	a, b   int
	replyc chan int // 请求中的回复频道

}

type binOp func(a, b int) int

func run(op binOp, req *Request) {

	req.replyc <- op(req.a, req.b)

}

func server(op binOp, service chan *Request, quit chan bool) {
	for i := 0; ;i++ {
		select {
		case req := <-service: // 请求到达这里
			// 开启请求的 Goroutine ：
			go run(op, req) // 不要等待 op
			fmt.Printf("server %d\n", i)
		case <- quit:
			fmt.Println("quit server\n")
			return
		}
	}

}

func startServer(op binOp) (service chan *Request, quit chan bool)  {

	service = make(chan *Request)

	quit = make(chan bool)

	go server(op, service, quit)

	return service, quit

}

func main() {

	adder, quit := startServer(func(a, b int) int { return a + b })

	const N = 100

	var reqs [N]Request

	for i := 0; i < N; i++ {

		req := &reqs[i]

		req.a = i

		req.b = i + N

		req.replyc = make(chan int)

		adder <- req

	}
	quit <- true
	// 校验：

	for i := N - 1; i >= 0; i-- { // 顺序无所谓

		if <-reqs[i].replyc != N+2*i {

			fmt.Println("fail at", i)

		} else {

			fmt.Println("Request ", i, "is ok!")

		}

	}

	fmt.Println("done")
}