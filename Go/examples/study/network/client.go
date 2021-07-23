/*
 * @Description: TCP-客户端
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-23 08:55:01
 * @LastEditTime: 2021-07-23 09:09:13
 */
package main

import (
	"fmt"
	"net"
	"bufio"
	"os"
	"strings"
)

func main() {
	conn, err := net.Dial("tcp", "localhost:9000")
	if err != nil {
		// 由于目标计算机积极拒绝而无法创建连接
		fmt.Println("由于目标计算机积极拒绝而无法创建连接", err.Error())
		return
	}

	inputReader := bufio.NewReader(os.Stdin)
	fmt.Println("首先，你叫什么名字？")
	clientName, _ := inputReader.ReadString('\n')
	trimmedClient := strings.Trim(clientName, "\r\n")
	// 给服务器发送信息直到程序退出
	for {
		fmt.Println("你想发送给服务器什么？按Q键退出")
		input, _ := inputReader.ReadString('\n')
		trimmedInput := strings.Trim(input, "\r\n")
		if trimmedInput == "Q" {
			return
		}
		_, err := conn.Write([]byte(trimmedClient + " 说：" + trimmedInput))
		if err != nil {
			fmt.Println("消息发送失败", err.Error())
		}
	}
}