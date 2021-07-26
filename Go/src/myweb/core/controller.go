/*
 * @Description:
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-26 16:03:05
 * @LastEditTime: 2021-07-26 16:06:24
 */
package core

type Controller struct {
	// context data
	Data map[interface{}]interface{}

	// route controller info
	controllerName string
	actionName     string
	methodMapping  map[string]func() //method:routertree
	AppController  interface{}
}

type ControllerInterface interface {
}
