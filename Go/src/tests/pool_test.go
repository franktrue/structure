/*
 * @Description:
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-24 09:55:27
 * @LastEditTime: 2021-07-24 09:55:28
 */
/*
 * @Description:  不使用sync.Pool
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-24 09:01:28
 * @LastEditTime: 2021-07-24 09:20:15
 */
package main

import (
	// "sync"
	"testing"
)

type Country struct {
	ID   int    `json:"id"`
	Name string `json:"name"`
}
type Province struct {
	ID   int    `json:"id"`
	Name string `json:"name"`
}
type City struct {
	ID   int    `json:"id"`
	Name string `json:"name"`
}
type County struct {
	ID   int    `json:"id"`
	Name string `json:"name"`
}
type Street struct {
	ID   int    `json:"id"`
	Name string `json:"name"`
}

// 模拟数据
// 地址信息对象
type AddressModule struct {
	Consignee       string    `json:"consignee"`
	Email           string    `json:"email"`
	Mobile          int64     `json:"mobile"`
	Country         *Country  `json:"country"`
	Province        *Province `json:"province"`
	City            *City     `json:"city"`
	County          *County   `json:"county"`
	Street          *Street   `json:"street"`
	DetailedAddress string    `json:"detailed_address"`
	PostalCode      string    `json:"postal_code"`
	AddressID       int64     `json:"address_id"`
	IsDefault       bool      `json:"is_default"`
	Label           string    `json:"label"`
	Longitude       string    `json:"longitude"`
	Latitude        string    `json:"latitude"`
}

// 不使用sync.Pool
func BenchmarkDemo_NoPool(b *testing.B) {
	b.RunParallel(func(pb *testing.PB) {
		for pb.Next() {
			// 直接初始化
			addressModule := &AddressModule{}
			addressModule.Consignee = ""
			addressModule.Email = ""
			addressModule.Mobile = 0
			addressModule.Country = &Country{
				ID:   0,
				Name: "",
			}
			addressModule.Province = &Province{
				ID:   0,
				Name: "",
			}
			addressModule.City = &City{
				ID:   0,
				Name: "",
			}
			addressModule.County = &County{
				ID:   0,
				Name: "",
			}
			addressModule.Street = &Street{
				ID:   0,
				Name: "",
			}
			addressModule.DetailedAddress = ""
			addressModule.PostalCode = ""
			addressModule.IsDefault = false
			addressModule.Label = ""
			addressModule.Longitude = ""
			addressModule.Latitude = ""
			// 下面这段代码没意义 只是为了不报语法错误
			if addressModule == nil {
				return
			}
		}
	})
}
