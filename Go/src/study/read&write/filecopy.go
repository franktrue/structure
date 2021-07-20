/*
 * @Description: 文件拷贝
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-20 10:28:17
 * @LastEditTime: 2021-07-20 10:35:06
 */
package main

import (
	"fmt"
	"os"
	"io"
)

func main() {
	CopyFile("copy.txt", "cols.txt")
	fmt.Println("Copy done!")
}

func CopyFile(distName, srcName string) (written int64, err error) {
	src, err := os.Open(srcName)
	if err != nil {
		return
	}
	defer src.Close()

	dist, err := os.OpenFile(distName, os.O_WRONLY|os.O_CREATE, 0644)
	if err != nil {
		return
	}
	defer dist.Close()

	return io.Copy(dist, src)
}
