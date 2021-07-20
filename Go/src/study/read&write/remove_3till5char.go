/*
 * @Description: 
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-20 14:58:01
 * @LastEditTime: 2021-07-20 15:01:28
 */
package main

import (
	"bufio"
	"fmt"
	"os"
	"io"
)

func main() {
	inputFile, _ := os.Open("goprogram")
	outputFile, _ := os.OpenFile("goprogramT", os.O_WRONLY|os.O_CREATE, 0666)
	defer inputFile.Close()
	defer outputFile.Close()
	inputReader := bufio.NewReader(inputFile)
	outputWriter := bufio.NewWriter(outputFile)
	for {
		inputString, _, readerError := inputReader.ReadLine()
		if readerError == io.EOF {
			fmt.Println("EOF")
			break;
		}
		outputString := string(inputString[2:5]) + "\r\n"
		_, err := outputWriter.WriteString(outputString)
		if err != nil {
			fmt.Println(err)
			return
		}
	}
	outputWriter.Flush()
	fmt.Println("Conversion done")
}