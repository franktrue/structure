/*
 * @Description:  运行时异常和 panic
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-20 15:21:37
 * @LastEditTime: 2021-07-20 15:25:05
 */
package main

import "fmt"

func main() {
	fmt.Println("Starting the program")
	// 不能随意地用 panic 中止程序，必须尽力补救错误让程序能继续执行。
	panic("A severe error occurred: stopping the program!")
	fmt.Println("Ending the program")
}