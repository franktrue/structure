/*
 * @Description: 子Goroutine超时控制之context.Context包的使用
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-23 16:12:38
 * @LastEditTime: 2021-07-23 16:13:30
 */
// 作用：Go语言第一形参通常都为context.Context类型，1. 传递上下文 2. 控制子Goroutine超时退出 3. 控制子Goroutine定时退出
package main

import (
	"context"
	"fmt"
	"time"
)

func main() {
	ctx, cancel := context.WithTimeout(context.TODO(), 5*time.Second)
	defer cancel()
	go func(ctx context.Context) {
		execResult := make(chan bool)
		// 模拟业务逻辑
		go func(execResult chan<- bool) {
			// 模拟处理超时
			time.Sleep(6 * time.Second)
			execResult <- true
		}(execResult)
		// 等待结果
		select {
		case <-ctx.Done():
			fmt.Println("超时退出")
			return
		case <-execResult:
			fmt.Println("处理完成")
			return
		}
	}(ctx)

	time.Sleep(10 * time.Second)
}

// [Running] go run ".../demo/main.go"
// 超时退出