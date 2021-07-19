/*
 * @Description: 二叉树结构体
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-18 14:37:43
 * @LastEditTime: 2021-07-18 14:42:45
 */
package main

import "fmt"

type Tree struct {
	left *Tree
	data string
	right *Tree
}

func main() {
	root := Tree{data: "root"}
	left := Tree{data: "left"}
	right:= Tree{data: "right"}
	root.left = &left
	root.right = &right
	fmt.Println(root)
}