/*
 * @Description: io/ioutil
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-20 09:06:35
 * @LastEditTime: 2021-07-20 09:17:48
 */
package main

import (
	"fmt"
	"io/ioutil"
	"os"
)

func main() {
	inputFile := "input.txt"
	outputFile := "output.txt"

	buf, err := ioutil.ReadFile(inputFile)

	if err != nil {
		fmt.Fprintf(os.Stderr, "File Error: %s\n", err)
	}

	fmt.Printf("%s\n", string(buf))

	err = ioutil.WriteFile(outputFile, buf, 0644)

	if err != nil {
		panic(err.Error())
	}
}