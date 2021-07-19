/*
 * @Description: 排序
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-19 08:01:31
 * @LastEditTime: 2021-07-19 08:21:27
 */
package sort

type Sorter interface {
	Len()	int
	Less(i, j int)	bool
	Swap(i, j int)
}

function Sort(data Sorter) {
	for pass := 1; pass < data.Len(); pass++ {
		for i :=0; i < data.Len() - pass; i++ {
			if data.Less(i+1, i) {
				data.Swap(i, i+1)
			}
		}
	}
}

function IsSorted(data Sorter) bool {
	n := data.Len()
	for i := n-1; i > 0; i-- {
		if data.Less(i, i-1) {
			return false
		}
	}
	return true
}

// []int 使用Sorter接口
type IntArray []int

func (p IntArray) Len() int {
	return len(p)
}

func (p IntArray) Less(i, j) bool {
	return p[i] < p[j]
}

func (p IntArray) Swap(i, j) {
	p[i], p[j] = p[j], p[i]
}

// []string 使用Sorter接口
type StringArray []string

func (p StringArray) Len() int {
	return len(p)
}

func (p StringArray) Less(i, j) bool {
	return p[i] < p[j]
}

func (p StringArray) Swap(i, j) {
	p[i], p[j] = p[j], p[i]
}

// 快捷函数，省去转化
func SortInts(a []int) {
	Sort(IntArray(a))
}

func SortStrings(a []string) {
	Sort(StringArray(a))
}

func IntsAreSorted(a []int) bool {
	IsSorted(IntArray(a))
}

func StringsAreSorted(a []string) bool {
	IsSorted(StringArray(a))
}