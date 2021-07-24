/*
 * @Description: switch + os.Stdin
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-20 08:33:42
 * @LastEditTime: 2021-07-20 08:42:35
 */
package main

import (
	"fmt"
	"bufio"
	"os"
)

func main() {
	inputReader := bufio.NewReader(os.Stdin)
	fmt.Println("请输入名字：")
	input, err := inputReader.ReadString('\n')
	if err != nil {
		fmt.Println("您输入了错误的信息，退出程序")
		return
	}
	// Unix和Windows上的行结束符不同！！！
	switch input {
		case "冯宁飞\r\n":
			fmt.Println("欢迎大帅哥冯宁飞")
		case "吴亦凡\r\n":
			fmt.Println("欢迎加拿大炮王吴亦凡")
		default:
			fmt.Println("这里不欢迎你，再见")
	}
}