/*
 * @Description: Web框架
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-26 13:27:18
 * @LastEditTime: 2021-07-26 15:51:21
 */
package main

import (
	"fmt"
	"net/http"
)

type Router struct{}

func (router *Router) ServeHTTP(w http.ResponseWriter, req *http.Request) {
	fmt.Fprint(w, "Hello World")
}

func main() {
	server := &http.Server{}
	server.Addr = ":8080"
	server.Handler = &Router{}
	server.ListenAndServe()
}
