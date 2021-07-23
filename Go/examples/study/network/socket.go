/*
 * @Description: net包从socket中打开，写入，读取数据
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-23 09:10:29
 * @LastEditTime: 2021-07-23 09:18:35
 */
package main

import (
	"fmt"
	"io"
	"net"
)

func main() {
	var (
		host 		= "www.baidu.com"
		port		= "80"
		remote		= host + ":" + port
		msg	string	= "GET / \n"
		data		= make([]uint8, 4096)
		read 		= true
		count		= 0 
	)
	// 创建一个socket链接
	con, err := net.Dial("tcp", remote)
	// 发送我们的消息，一个http GET请求
	io.WriteString(con, msg)
	// con.Write([]byte(msg))

	// 读取服务器响应
	for read {
		count, err = con.Read(data)
		read = (err == nil)
		fmt.Println(string(data[:count]))
	}
	con.Close()
}