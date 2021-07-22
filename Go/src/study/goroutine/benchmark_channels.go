/*
 * @Description: 标杆分析 Goroutines
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-22 17:58:32
 * @LastEditTime: 2021-07-22 17:58:44
 */
 package main

 import (
	 "fmt"
	 "testing"
 )
 
 func main() {
	 fmt.Println(" sync", testing.Benchmark(BenchmarkChannelSync).String())
	 fmt.Println("buffered", testing.Benchmark(BenchmarkChannelBuffered).String())
 }
 
 func BenchmarkChannelSync(b *testing.B) {
	 ch := make(chan int)
	 go func() {
		 for i := 0; i < b.N; i++ {
			 ch <- i
		 }
		 close(ch)
	 }()
	 for range ch {
	 }
 }
 
 func BenchmarkChannelBuffered(b *testing.B) {
	 ch := make(chan int, 128)
	 go func() {
		 for i := 0; i < b.N; i++ {
			 ch <- i
		 }
		 close(ch)
	 }()
	 for range ch {
	 }
 }