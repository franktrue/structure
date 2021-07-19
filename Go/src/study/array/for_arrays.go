/*
 * @Description: 数组遍历
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-18 09:23:45
 * @LastEditTime: 2021-07-18 09:59:39
 */
package main

import "fmt"

func main(){
	var arr [5]int

	for i := 0; i < len(arr); i++ {
		arr[i] = i * 2
	}

	for i := 0; i < len(arr); i++ {
		fmt.Printf("Array at index %d is %d\n", i, arr[i])
	}
	fmt.Println("数组arr的总和为", sum(&arr))

	a := [...]string{"a", "b", "c", "d"}

	for i, v := range a {
		fmt.Println("Array item", i, "is", v)
	}

	// Go语言中数组是一种值类型，可以通过new来创建
	b := new([5]int)	// 返回的是数组的地址引用
	b[1] = 1
	fmt.Println("数组b的引用为", b)
	c := *b
	c[2] = 2
	fmt.Println("数组c为", c)
	fmt.Println("数组b为", *b)
}

func sum(arr *[5]int) (sum int) {
	for _, v := range arr {
		sum += v
	}
	return
}
