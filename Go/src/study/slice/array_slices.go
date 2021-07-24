/*
 * @Description: 切片数组练习
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-18 10:02:47
 * @LastEditTime: 2021-07-18 10:16:56
 */
package main

import "fmt"

func main() {
	var arr1 [6]int
	/**
	 * 切片在内存中的组织方式实际上是一个有 3 个域的结构体：指向相关数组的指针，切片长度以及切片容量。
	 * 注意：绝对不要用指针指向slice。切片本身已经是一个引用类型，所以它本身就是一个指针
	 */
	var slice1 []int = arr1[2:5]

	for i, _ := range arr1 {
		arr1[i] = i
	}

	for i := 0; i < len(slice1); i++ {
		fmt.Printf("Slice at %d is %d\n", i, slice1[i])
	}

	fmt.Printf("The length of arr1 is %d\n", len(arr1))
    fmt.Printf("The length of slice1 is %d\n", len(slice1))
    fmt.Printf("The capacity of slice1 is %d\n", cap(slice1))

	// 增长slice, 扩展到arr1[5]
	slice1 = slice1[0:4]
	for i := 0; i < len(slice1); i++ {
		fmt.Printf("Slice at %d is %d\n", i, slice1[i])
	}
	fmt.Printf("The length of slice1 is %d\n", len(slice1))
    fmt.Printf("The capacity of slice1 is %d\n", cap(slice1))

	fmt.Printf("Sum of slice is %d\n", sum(slice1));
}

func sum(a []int) (s int) {
	for _, v := range a {
		s += v
	}
	return
}