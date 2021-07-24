/*
 * @Description: 并发安全的Map之 SYNC.MAP
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-24 09:30:19
 * @LastEditTime: 2021-07-24 09:30:43
 */
package main

import (
	"sync"
	"testing"
)

func BenchmarkDemo(b *testing.B) {
	demoMap := &sync.Map{}
	demoMap.Store("a", "a")
	demoMap.Store("b", "b")
	b.RunParallel(func(pb *testing.PB) {
		for pb.Next() {
			demoMap.Store("a", "aa")
		}
	})
}
