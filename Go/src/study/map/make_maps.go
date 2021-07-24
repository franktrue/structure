/*
 * @Description: 声明、初始化map
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-18 13:04:50
 * @LastEditTime: 2021-07-18 13:25:50
 */
package main

import "fmt"

func main() {
	// 不要使用new，永远使用make来构造map
	// map是无序的，不管是按照key还是按照value默认都是不排序的

	// map是引用类型
	var mapList map[string]int
	var mapAssigned map[string]int

	mapList = map[string]int{"one": 1, "two": 2}

	fmt.Printf("Map literal at \"one\" is: %d\n", mapList["one"])
	fmt.Printf("Map literal at \"two\" is: %d\n", mapList["two"])
	
	mapCreated := make(map[string]float32)

	// 引用类型 a = &b
	mapAssigned = mapList

	mapCreated["key1"] = 4.5
	mapCreated["key2"] = 3.14159

	mapAssigned["two"] = 3

	
    fmt.Printf("Map created at \"key2\" is: %f\n", mapCreated["key2"])
    fmt.Printf("Map assigned at \"two\" is: %d\n", mapAssigned["two"])
	fmt.Printf("Map literal at \"two\" is: %d\n", mapList["two"])
    

	if _, ok := mapList["ten"]; !ok {
		fmt.Println("mapList[\"ten\"]不存在")
		fmt.Printf("Map literal at \"ten\" is: %d\n", mapList["ten"])
	}

	items := make([]map[int]int, 5)

	for key := range items {
		items[key] = make(map[int]int)
		items[key] = map[int]int{1:1, 2:key}
	}
	fmt.Printf("Value of items: %v\n", items)
}