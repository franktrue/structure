/*
 * @Description: 空接口
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-19 09:07:10
 * @LastEditTime: 2021-07-19 09:10:18
 */
package main

import "fmt"

type specialString string

var whatIsThis specialString = "hello"

func TypeSwitch() {
	testFunc := func(any interface{}) {
		switch v := any.(type) {
			case bool:
				fmt.Printf("any %v is a bool type", v)
			case int:
				fmt.Printf("any %v is an int type", v)
			case float32:
				fmt.Printf("any %v is a float32 type", v)
			case string:
				fmt.Printf("any %v is a string type", v)
			case specialString:
				fmt.Printf("any %v is a special String!", v)
			default:
				fmt.Println("unknown type!")
		}
	}
	testFunc(whatIsThis)
}

func main() {
	TypeSwitch()
}