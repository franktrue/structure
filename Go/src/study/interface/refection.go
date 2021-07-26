/*
 * @Description: 反射
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-26 17:15:02
 * @LastEditTime: 2021-07-26 17:39:33
 */
package main

import (
	"fmt"
	"reflect"
)

type A struct {
	a string
}

type B interface {
	Test()
}

func (a *A) Test() {
	fmt.Println(a.a)
}

func main() {
	var x float64 = 3.4
	fmt.Println("type:", reflect.TypeOf(x))
	v := reflect.ValueOf(x)
	fmt.Println("value:", v)
	fmt.Println("type:", v.Type())
	fmt.Println("kind:", v.Kind())
	fmt.Println("value:", v.Float())
	fmt.Println(v.Interface())
	fmt.Printf("value is %5.2e\n", v.Interface())
	y := v.Interface().(float64)
	fmt.Println(y)

	fmt.Println("----------------------")
	a := &A{a: "hello world"}
	fmt.Println("type:", reflect.TypeOf(a))
	fmt.Println("type.Kind:", reflect.TypeOf(a).Kind())
	av := reflect.ValueOf(a)
	fmt.Println("value:", av)
	fmt.Println("value.Kind:", av.Kind())
	fmt.Println("value.Indirect:", reflect.Indirect(av))
	fmt.Println("value.Indirect.Type:", reflect.Indirect(av).Type())
}
