/*
 * @Description: byte型切片
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-18 10:28:29
 * @LastEditTime: 2021-07-18 10:38:27
 */
 package main
 
 import "fmt"

 func main() {
	slice1 := make([]int, 0, 10)
	for i := 0; i < cap(slice1); i++ {
		slice1 = slice1[0:i+1]
		slice1[i] = i
		fmt.Printf("The length of slice is %d\n", len(slice1))
	}
	
	// print the slice:
    for i := 0; i < len(slice1); i++ {
        fmt.Printf("Slice at %d is %d\n", i, slice1[i])
    }
 }
