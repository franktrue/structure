/*
 * @Description: 写文件
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-20 09:56:36
 * @LastEditTime: 2021-07-20 10:06:28
 */
package main

import (
	"fmt"
	"os"
	"bufio"
)

func main() {
	// var outputWriter *bufio.Writer
    // var outputFile *os.File
    // var outputError os.Error
    // var outputString string
	outputFile, outputError := os.OpenFile("output.dat", os.O_WRONLY|os.O_CREATE, 0666)
	if outputError != nil {
		fmt.Printf("An error occurred with file opening or creation\n")
        return  
	}

	defer outputFile.Close()

	outputWriter := bufio.NewWriter(outputFile)
	outputString := "Hello World!\n"

	for i := 0; i < 10; i++ {
		outputWriter.WriteString(outputString)
	}
	// 缓冲区内容完全写入
	outputWriter.Flush()
}
