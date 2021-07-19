/*
 * @Description: 构建通用类型或包含不同类型变量的数组
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-19 09:18:13
 * @LastEditTime: 2021-07-19 09:24:18
 */
package main

// 定义空接口
type Element interface {}

type Vector struct {
	p []Element	// 使用空接口作为元素
}

func (v *Vector) At(i int) Element {
	return v.p[i]
}

func (v *Vector) Set(i int, e Element) {
	v.p[i] = e
}

// 复制切片数据至空接口切片只能显示复制（for-range），无法直接赋值