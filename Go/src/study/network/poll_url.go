/*
 * @Description: 访问并读取页面
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-23 10:53:19
 * @LastEditTime: 2021-07-23 11:05:50
 */
package main

import (
	"fmt"
	"net/http"
)

var urls = []string{
	"http://www.baidu.com/",
    "http://www.aliyun.com/",
}

func main() {
	// http.Get
	// http.Redirect(w ResponseWriter, r *Request, url string, code int)
	for _, url := range urls {
		resp, err := http.Head(url)
		if err != nil {
			fmt.Println("Error", url, err)
		}
		fmt.Println(url, ": ", resp.Status)
	}

}