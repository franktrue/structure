/*
 * @Description: 直接写入不经过缓冲区
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-20 10:09:22
 * @LastEditTime: 2021-07-20 10:30:22
 */
package main

import (
	"os"
)

func main() {
	var outputFile *os.File
	var outputError error
	outputFile, outputError = os.OpenFile("output2.txt", os.O_WRONLY|os.O_CREATE, 0666)
	if outputError != nil {
		panic(outputError.Error())
	}
	defer outputFile.Close()
	outputFile.WriteString("hello, world in a file\n")
}