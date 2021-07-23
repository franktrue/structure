/*
 * @Description: 一个简单的服务器
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-23 11:15:26
 * @LastEditTime: 2021-07-23 11:42:38
 */
package main

import (
	"fmt"
	"net/http"
	"log"
	"errors"
)

const form = `
    <html><body>
        <form action="#" method="post" name="bar">
            <input type="text" name="in" />
            <input type="submit" value="submit"/>
        </form>
    </body></html>
`

type HandleFunc func(http.ResponseWriter, *http.Request)

func main() {
	http.HandleFunc("/test1", logPanics(SimpleServer))
	http.HandleFunc("/test2", logPanics(FormServer))
	if err := http.ListenAndServe("localhost:8080", nil); err != nil {
		panic(err)
	}
}

func logPanics(function HandleFunc) HandleFunc {
	return func(writer http.ResponseWriter, request *http.Request) {
		defer func() {
			if x := recover(); x != nil {
				log.Printf("[%s] caught panic: %v", request.RemoteAddr, x)

				// 可以给页面一个错误信息，如下面的示例返回了一个 500
                http.Error(writer, http.StatusText(http.StatusInternalServerError), http.StatusInternalServerError)
			}
		}()

		function(writer, request)
	}
}

func SimpleServer(w http.ResponseWriter, req *http.Request) {
	panic(errors.New("test error")) 
	w.Header().Set("Content-Type", "text/html")
	fmt.Fprint(w, "<h1>Hello, World</h1>")
}

func FormServer(w http.ResponseWriter, req *http.Request) {
	w.Header().Set("Content-Type", "text/html")
	switch req.Method {
	case "GET":
		fmt.Fprint(w, form)
	case "POST":
		fmt.Fprint(w, req.FormValue("in"))
	}
}