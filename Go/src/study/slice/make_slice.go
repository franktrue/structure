/*
 * @Description: 通过make方法生成slice
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-18 10:18:53
 * @LastEditTime: 2021-07-18 10:27:39
 */
package main

import "fmt"

func main() {
	var slice1 []int = make([]int, 10)

	for i := 0; i < len(slice1); i++ {
		slice1[i] = 5 * i
	}

	for i, v := range slice1 {
		fmt.Printf("Slice1 at %d is %d\n", i, v)
	}

	fmt.Printf("The length of slice1 is %d\n", len(slice1));
	fmt.Printf("The capacity of slice1 is %d\n", cap(slice1));

	var slice2 []int = new([10]int)[0:5]
	for i := 0; i < len(slice2); i++ {
		slice2[i] = i
	}

	for i, v := range slice2 {
		fmt.Printf("Slice2 at %d is %d\n", i, v)
	}
}