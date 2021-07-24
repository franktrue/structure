/*
 * @Description: 应用包测试
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-24 10:54:23
 * @LastEditTime: 2021-07-24 10:54:41
 */
// $GOPATH/src/mymath/sqrt.go源码如下：
package mymath

func Sqrt(x float64) float64 {
	z := 0.0
	for i := 0; i < 1000; i++ {
		z -= (z*z - x) / (2 * x)
	}
	return z
}
