/*
 * @Description: 
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-20 10:54:54
 * @LastEditTime: 2021-07-20 10:58:45
 */
package main

import (
	"flag" // command line option parser
	"os"
	"fmt"
)

var NewLine = flag.Bool("n", false, "print newline") // echo -n flag, of type *bool

const (
	Space   = " "
	Newline = "\n"
)

func main() {
	flag.PrintDefaults()
	flag.Parse() // Scans the arg list and sets up flags
	var s string = ""
	fmt.Println("flag.NArg():", flag.NArg())
	for i := 0; i < flag.NArg(); i++ {
		if i > 0 {
			s += " "
			if *NewLine { // -n is parsed, flag becomes true
				s += Newline
			}
		}
		fmt.Printf("flag.NArg(%d):%s\n", i, flag.Arg(i))
		s += flag.Arg(i)
	}
	os.Stdout.WriteString(s)
}