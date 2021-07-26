/*
 * @Description: 存储路由
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-26 15:56:11
 * @LastEditTime: 2021-07-26 17:09:08
 */
package core

import (
	"net/http"
	"reflect"
	"regexp"
	"strings"
)

type controllerInfo struct {
	regex          *regexp.Regexp
	params         map[int]String
	controllerType reflect.Type
}

type ControllerRegister struct {
	routers []*controllerInfo
	// Application *App
}

func (p *ControllerRegister) Add(pattern string, c ControllerInterface) {
	parts := strings.Split(pattern, "/")

	j := 0

	params := make(map[int]string)

	// 划分参数和表达式
	for i, part := range parts {
		if strings.HasPrefix(part, ":") {
			expr := "([^/]+)"

			// a user may choose to override the defult expression
			// similar to expressjs: ‘/user/:id([0-9]+)’
			if index := strings.Index(part, "("); index != -1 {
				expr = part[index:]
				part = part[:index]
			}
			params[j] = part
			parts[i] = expr
			j++
		}
	}

	// recreate the url pattern, with parameters replaced
	// by regular expressions. then compile the regex

	pattern = strings.Join(parts, "/")

	regex, regexErr := regexp.Compile(pattern)

	if regexErr != nil {
		panic(regexErr)
		return
	}

	// 创建路由
	t := reflect.Indirect(reflect.ValueOf(c)).Type()
	route := new(controllerInfo)
	route.regex = regex
	route.params = params
	route.controllerType = t

	p.routers = append(p.routers, route)
}

func (p *ControllerRegister) ServeHTTP(w http.ResponseWriter, r *http.Request) {
	requestPath := r.URL.Path

	// 路由匹配
	for _, route := range p.routers {
		// 检查路由正则匹配
		if !route.regex.MatchString(requestPath) {
			continue
		}

		matchs := route.regex.FindStringSubmatch(requestPath)

		// 再次检查路由匹配
		if len(matches[0]) != len(requestPath) {
			continue
		}
	}
}
