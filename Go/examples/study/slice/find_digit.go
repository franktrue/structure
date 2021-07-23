/*
 * @Description: 从文件中找出数字
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-18 11:42:02
 * @LastEditTime: 2021-07-18 12:18:18
 */
package main

import (
	"fmt"
	"regexp"
	"io/ioutil"
)

var digitRegexp = regexp.MustCompile("[0-9]+")

func main() {
	b1 := findDights1("test.txt")
	fmt.Println("b1:", string(b1))

	b2 := findDights2("test.txt")
	fmt.Println("b2:", string(b2))

	b3 := findDights3("test.txt")
	fmt.Println("b3:", string(b3))
}

func findDights1(filename string) []byte {
	b, _ := ioutil.ReadFile(filename)
	return digitRegexp.Find(b)
}

func findDights2(filename string) []byte {
	b, _ := ioutil.ReadFile(filename)
	b = digitRegexp.Find(b)
	c := make([]byte, len(b))
	copy(c, b)
	return c
}

func findDights3(filename string) []byte {
	fileBytes, _ := ioutil.ReadFile(filename)
	b := digitRegexp.FindAll(fileBytes, len(fileBytes))
	c := make([]byte, 0)
	for _, bytes := range b {
		c = append(c, bytes ...)
	}
	fmt.Println(b)
	return c
}