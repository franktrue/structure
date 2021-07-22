/*
 * @Description: Master-Work模式
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-22 10:22:29
 * @LastEditTime: 2021-07-22 10:53:22
 */
package main

import (
	"fmt"
	"time"
	"strconv"
)

const N = 3

type Task struct {
	// some state
	name string
}

// 分发任务
func sendWork(pending chan *Task) {
	for i :=0; i < 5;i++ {
		task := new(Task)
		task.name = "name_" + strconv.Itoa(i)
		fmt.Printf("Task %s has been send!\n", task.name)
		pending <- task
	}
}

// 消费任务
func consumeWork(done chan *Task) {
	for t := range done {
		fmt.Printf("Task %s has been finished!\n", t.name)
	}
}

// 处理任务
func worker(in, out chan *Task) {
	for {
		t := <- in
		process(t)
		out <- t
	}
}

func process(t *Task) {
	time.Sleep(1e9)
	fmt.Printf("Task %s is processing\n", t.name)
}

func main() {
	pending, done := make(chan *Task), make(chan *Task)
	go sendWork(pending)
	for i := 0; i < N; i++ {
		go worker(pending, done)
	}
	go consumeWork(done)

	time.Sleep(10e9)
}