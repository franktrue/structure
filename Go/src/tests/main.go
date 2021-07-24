/*
 * @Description: DLV工具的使用
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-24 10:14:49
 * @LastEditTime: 2021-07-24 10:15:01
 */
package main

import (
	_ "net/http/pprof"

	"github.com/gin-gonic/gin"
)

// 全局变量不会像PHP一样，在完成一次请求之后被销毁
var GlobalVarDemo int32 = 0

// 模拟接口逻辑
func main() {
	r := gin.Default()
	r.GET("/ping", func(c *gin.Context) {
		GlobalVarDemo++
		c.JSON(200, gin.H{
			"message": GlobalVarDemo,
		})
	})
	r.Run()
}
