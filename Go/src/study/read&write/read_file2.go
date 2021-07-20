/*
 * @Description: fmt.Fscan*
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-20 09:23:48
 * @LastEditTime: 2021-07-20 09:43:17
 */
package main

import (
	"fmt"
	"os"
	"path/filepath"
)

func main() {
	filename := filepath.Base("cols.txt")
	file, err := os.Open(filename)
	if err != nil {
		panic(err)
	}
	defer file.Close()

	var col1, col2, col3 []string

	for {
		var v1, v2, v3 string
		_, err := fmt.Fscanln(file, &v1, &v2, &v3)
		if err != nil {
			break
		}

		col1 = append(col1, v1)
		col2 = append(col2, v2)
		col3 = append(col3, v3)
	}

	fmt.Println(col1)
	fmt.Println(col2)
	fmt.Println(col3)
}