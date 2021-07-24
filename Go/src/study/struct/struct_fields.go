/*
 * @Description: 结构体示例
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-18 14:25:08
 * @LastEditTime: 2021-07-18 14:30:28
 */
package main

import "fmt"
 
type struct1 struct {
	i1 	int
	f1 	float32
	str string
}

func main() {
	ms := new(struct1)
	ms.i1 = 100
	ms.f1 = 3.14
	ms.str = "Rick"

	fmt.Printf("The int is: %d\n", ms.i1)
    fmt.Printf("The float is: %f\n", ms.f1)
    fmt.Printf("The string is: %s\n", ms.str)
    fmt.Println(ms)

	var ms1 struct1
	var ms2 *struct1
	ms1 = struct1{10, 3.14, "ms1"}
	fmt.Println(ms1)

	ms2 = new(struct1)
	ms2.i1 = 50
	ms2.f1 = 3.157
	ms2.str = "ms2"
	fmt.Println(ms2)
}
