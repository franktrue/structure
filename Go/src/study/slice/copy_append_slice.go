/*
 * @Description: 拷贝和追加切片
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-18 10:42:40
 * @LastEditTime: 2021-07-18 11:35:08
 */
package main

import "fmt"

func main() {
	sl_from := []int{1, 2, 3}
	sl_to := make([]int, 10)
	
	n := copy(sl_to, sl_from[1:3])
	fmt.Println(sl_to)
	fmt.Printf("Copied %d elements\n", n)

	sl3 := []int{1, 2, 3}
	sl3 = append(sl3, 4, 5, 6)
	fmt.Println(sl3)

	sl4 := make([]int, 3)
	copy(sl4, sl_from)
	for i := 0; i < len(sl4); i++ {
		fmt.Printf("sl4 at %d is %d\n", i, sl4[i])
	}
	fmt.Println()
	sl4 = append(sl4[:1], sl4[2:] ...)
	for i := 0; i < len(sl4); i++ {
		fmt.Printf("sl4 at %d is %d\n", i, sl4[i])
	}
}

func AppendByte(slice []byte, data ...byte) []byte {
	m := len(slice)
	n := m + len(data)
	if n > cap(slice) {
		newSlice := make([]byte, 2*(n+1))
		copy(newSlice, slice)
		slice = newSlice
	}
	copy(slice[m:n], data)
	return slice
}
