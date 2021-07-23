/*
 * @Description: 用buffer读取文件
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-20 11:11:54
 * @LastEditTime: 2021-07-20 14:13:30
 */
package main

import (
	"fmt"
	"os"
	"bufio"
	"io"
	"flag"
)

func cat(r *bufio.Reader) {
	for {
		buf, err := r.ReadBytes('\n')
		if err == io.EOF {
			break
		}
		fmt.Fprintf(os.Stdout, "%s", buf)
	}
	return
}

func main() {
	flag.Parse()
	if flag.NArg() == 0 {
		cat(bufio.NewReader(os.Stdin))
	}

	for i := 0; i < flag.NArg(); i++ {
		f, err := os.Open(flag.Arg(i))
		if err != nil {
			fmt.Fprintf(os.Stderr, "%s:error reading from %s: %s\n", os.Args[0], flag.Arg(i), err.Error())
            continue
		}
		defer f.Close()
		cat(bufio.NewReader(f))
	}
}