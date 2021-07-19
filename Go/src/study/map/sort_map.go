/*
 * @Description: 
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-18 13:26:15
 * @LastEditTime: 2021-07-18 13:32:05
 */
package main

import (
	"fmt"
	"sort"
)
var (
    barVal = map[string]int{"alpha": 34, "bravo": 56, "charlie": 23,
                            "delta": 87, "echo": 56, "foxtrot": 12,
                            "golf": 34, "hotel": 16, "indio": 87,
                            "juliet": 65, "kili": 43, "lima": 98}
)

func main() {
	// map是无序的，
	// 如果你想为 map 排序，需要将 key（或者 value）拷贝到一个切片，
	// 再对切片排序，然后可以使用切片的 for-range 方法打印出所有的 key 和 value。

	fmt.Println("无序打印")
	for k, v := range barVal {
		fmt.Printf("Key: %v, Value: %v / ", k, v)
	}

	keys := make([]string, len(barVal))
	i := 0
	for k := range barVal {
		keys[i] = k
		i++
	}
	sort.Strings(keys)
	fmt.Println()
	fmt.Println("有序打印")
	for _, k := range keys {
		fmt.Printf("Key: %v, Value: %v / ", k, barVal[k])
	}
}