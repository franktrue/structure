/*
 * @Description: Scan,Sscan
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-20 08:12:17
 * @LastEditTime: 2021-07-20 08:19:59
 */
package main

import "fmt"

var (
	firstName, lastName, s string
	i int
	f float32
	input = "59.12 / 5212 / Go"
	format = "%f / %d / %s"
)

func main() {
	fmt.Println("请输入您的姓名：")
	fmt.Scanln(&firstName, &lastName)
	// fmt.Scanf("%s %s", &firstName, &lastName)
	fmt.Printf("Hi! %s %s\n", firstName, lastName)

	fmt.Sscanf(input, format, &f, &i, &s)
	fmt.Println("从字符串中读到：", f, i, s)
}