/*
 * @Description: 读取压缩文件
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-20 09:45:45
 * @LastEditTime: 2021-07-20 09:52:11
 */
package main

import (
	"fmt"
	"bufio"
	"os"
	"compress/gzip"
)

func main() {
	fName := "input.gz"
	var reader *bufio.Reader

	fi, err := os.Open(fName)
	if err != nil {
		fmt.Fprintf(os.Stderr, "%v, Can't open %s: error: %s\n", os.Args[0], fName,
            err)
        os.Exit(1)
	}

	fz, err := gzip.NewReader(fi)
	if err != nil {
		fmt.Println("reading fi")
		reader = bufio.NewReader(fi)
	}else {
		fmt.Println("reading fz")
		reader = bufio.NewReader(fz)
	}

	for {
		line, err := reader.ReadString('\n')
        if err != nil {
            fmt.Println("Done reading file")
            os.Exit(0)
        }
        fmt.Println(line)
	}
}