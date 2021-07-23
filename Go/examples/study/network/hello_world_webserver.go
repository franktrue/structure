/*
 * @Description: http-服务器
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-23 09:53:35
 * @LastEditTime: 2021-07-23 10:41:12
 */
package main

import (
	"fmt"
	"net/http"
	"log"
)

func HelloServer(w http.ResponseWriter, req *http.Request) {
	fmt.Println("Inside HelloServer handler")
	// 实现了 io.Writer
	fmt.Fprintf(w, "Hello,"+req.URL.Path[1:])
}

func main() {
	// http.HandleFunc("/", HelloServer)
	// err := http.ListenAndServe("localhost:8080", nil)
	// https 使用 http.ListenAndServeTLS()
	err := http.ListenAndServe("localhost:8080", http.HandlerFunc(HelloServer))
	if err != nil {
		log.Fatal("ListenAndServe:", err.Error())
	}
}