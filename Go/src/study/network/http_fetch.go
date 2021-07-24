/*
 * @Description: http.Get()
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-23 11:06:01
 * @LastEditTime: 2021-07-23 11:08:26
 */
package main

import (
	"fmt"
	"io/ioutil"
	"log"
	"net/http"
)

func main() {
	res, err := http.Get("https://www.baidu.com")
	checkError(err)
	data, err := ioutil.ReadAll(res.Body)
	checkError(err)
	fmt.Printf("Got: %q", string(data))
}

func checkError(err error) {
    if err != nil {
        log.Fatalf("Get : %v", err)
    }
}