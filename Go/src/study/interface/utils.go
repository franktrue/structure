/*
 * @Description: 
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-19 08:40:16
 * @LastEditTime: 2021-07-19 08:42:05
 */
package utils

/**
 * 通用读接口
 */
type Reader interface {
	Read(p []byte) (n int, err error)
}

/**
 * 通用写接口
 */
type Writer interface {
	Write(p []byte) (n int, err error)
}