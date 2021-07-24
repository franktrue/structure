/*
 * @Description: TCP-服务器
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-23 08:43:55
 * @LastEditTime: 2021-07-23 09:34:25
 */
package main

import (
	"fmt"
	"net"
)

func main() {
	fmt.Println("Starting the server ...")

	listener, err := net.Listen("tcp", "localhost:9000")
	if err != nil {
		fmt.Println("Error listening", err.Error())
		return // 终止程序
	}

	for {
		conn, err := listener.Accept()
		if err != nil {
			fmt.Println("Error accepting", err.Error())
			return // 终止程序
		}
		go doServerStuff(conn)
	}
}

func doServerStuff(conn net.Conn) {
	for {
		buf := make([]byte, 512)
		len, errRead := conn.Read(buf)
		if errRead != nil {
			fmt.Println("Error reading", errRead.Error())
            return //终止程序
		}
		fmt.Printf("Received data: %v\n", string(buf[:len]))
		// _, errWrite := conn.Write([]byte("I recvice your msg"))
		if errWrite != nil {
			fmt.Println("回复消息失败", errWrite.Error())
		}
	}
}
