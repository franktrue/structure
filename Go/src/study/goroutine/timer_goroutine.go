/*
 * @Description: timer和ticker
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-22 08:51:19
 * @LastEditTime: 2021-07-22 08:54:38
 */
package main

import (
	"fmt"
	"time"
)

func main() {
	tick := time.Tick(1e8)
	boom := time.After(5e8)

	for {
		select {
		case <- tick:
			fmt.Println("tock.")
		case <- boom:
			fmt.Println("Boom!")
		default:
			fmt.Println("    .")
			time.Sleep(5e7)
		}
	}
}