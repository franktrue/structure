/*
 * @Description: os.Open(filename) 打开文件
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-20 08:52:00
 * @LastEditTime: 2021-07-20 09:05:01
 */
package main

import (
	"fmt"
	"os"
	"bufio"
	"io"
)

func main() {
	inputFile, inputError := os.Open("test.txt")
	if inputError != nil {
		fmt.Printf("打开文件时发生错误\n" +
            "这个文件存在吗？\n" +
            "你有使用它的权限吗\n")
        return // exit the function on error
	}
	// 关闭文件
	defer inputFile.Close()

	inputReader := bufio.NewReader(inputFile)	// 返回 *Reader
	for {
		inputString, readerError := inputReader.ReadLine('\n')
		fmt.Printf("输入内容是：%s", inputString)
		if readerError == io.EOF {
			return
		}
	}
}
