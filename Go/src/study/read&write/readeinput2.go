/*
 * @Description: bufio和os.Stdin
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-20 08:23:50
 * @LastEditTime: 2021-07-20 08:31:46
 */
package main

import (
	"fmt"
	"bufio"
	"os"
)

var inputReader *bufio.Reader
var input string
var err error

func main() {
	// 绑定标准输入
	inputReader = bufio.NewReader(os.Stdin)
	fmt.Println("请输入内容：")
	input, err = inputReader.ReadString('\n')
	if err == nil {
		fmt.Println("输入的内容是：", input)
	}
}
