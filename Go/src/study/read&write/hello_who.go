/*
 * @Description: 获取命令行参数
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-20 10:44:02
 * @LastEditTime: 2021-07-20 10:45:34
 */
package main

import (
	"fmt"
	"os"
)

func main() {
	fmt.Printf("Hello %s", os.Args[1])
}