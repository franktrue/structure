# Go学习
| 由于网络原因请设置代理
```
go env -w GO111MODULE=on # 对应gomod 和 gopath 两个包管理方案，并且相互不兼容。
go env -w GOPROXY=https://goproxy.cn,direct
```

gomod 和 gopath 两个包管理方案，并且相互不兼容。

在 gopath 查找包，按照 goroot 和多 gopath 目录下 src/xxx 依次查找。

在 gomod 下查找包，解析 go.mod 文件查找包，mod 包名就是包的前缀，里面的目录就后续路径了。在 gomod 模式下，查找包就不会去 gopath 查找，只是 gomod 包缓存在 gopath/pkg/mod 里面。

## 如何编译和安装一个可运行的应用
| go env -w GO111MODULE=off 使用gopath模式
### 编译包
有两种方式可以进行安装(`Go\src\mymath`)
1. 只要进入对应的应用包目录，然后执行 `go install`，就可以安装了
2. 在任意的目录执行如下代码 `go install mymath`
安装完之后，我们可以进入如下目录
```
cd $GOPATH/pkg/${GOOS}_${GOARCH}
// 可以看到如下文件
mymath.a
```
安装完成后即可在其他包中引用使用

### 编译可执行文件
1. 编译程序
进入应用目录`Go\src\mathapp`（必须是`main`包），执行`go build`，在该目录下面会生成一个 mathapp 的可执行文件(windows下`mathapp.exe`)
2. 安装程序
进入该目录执行 `go install`，那么在 `$GOPATH/bin/` 下增加了一个可执行文件 `mathapp`（windows下`mathapp.exe）
`$GOPATH/bin/`要加到系统PATH里面，这样就可以命令行下使用了

### 安装远程包
```
go get github.com/astaxie/beedb

# 更新远程包
go get -u github.com/astaxie/beedb
```
go get 本质上可以理解为首先第一步是通过源码工具 `clone` 代码到 `src`下面，然后执行 `go install`

### 目录结构
```
bin/
    mathapp
pkg/
    平台名/ 如：darwin_amd64、linux_amd64
         mymath.a
         github.com/
              astaxie/
                   beedb.a
src/
    mathapp
          main.go
    mymath/
          sqrt.go
    github.com/
           astaxie/
                beedb/
                    beedb.go
                    util.go
```
从上面的结构我们可以很清晰的看到，`bin` 目录下面存的是编译之后可执行的文件，`pkg` 下面存放的是应用包，`src` 下面保存的是应用源代码

### 移除当前源码包和关联源码包的编译生成文件
```
go clean -i -n
```
一般都是利用这个命令清除编译文件，然后 github 递交源码，在本机测试的时候这些编译文件都是和系统相关的，但是对于源码管理来说没必要。

参数介绍
* -i 清除关联的安装的包和可运行文件，也就是通过 go install 安装的文件
* -n 把需要执行的清除命令打印出来，但是不执行，这样就可以很容易的知道底层是如何运行的
* -r 循环的清除在 import 中引入的包
* -x 打印出来执行的详细命令，其实就是 -n 打印的执行版本


## 性能分析
| 作用：CPU分析、内存分析。通过可视化调用链路、可视化火焰图、TOP函数等快速定位代码问题、提升代码性能。

提示：性能分析可在`your_path\Go\src\tests\`目录下进行测试

* pprof
* trace
* dlv

### PPROF的使用
需安装图形呈现辅助工具Graphviz，[下载](https://graphviz.gitlab.io/_pages/Download/Download_windows.html)
#### 基准测试

1. 执行基准测试，生成cpu.profile文件和mem.profile文件。命令如下
```
go test -benchmem -run=^$ -bench ^BenchmarkSyncMap$ demo -v -count=1 -cpuprofile=cpu.profile -memprofile=mem.profile -benchtime=10s
```
常用参数解释：
```
-benchmem: 输出内存指标
-run: 正则，指定需要test的方法
-bench: 正则，指定需要benchmark的方法
-v: 即使成功也输出打印结果和日志
-count: 执行次数
-cpuprofile: 输出cpu的profile文件
-memprofile: 输出内存的profile文件
-benchtime: 执行时间

# 更多参数请查看：
go help testflag
```
会输出cpu的profile文件和内存的profile文件

2. 使用go tool自带的pprof工具分析测试结果。命令如下：
```
go tool pprof -http=:8000 cpu.profile
```

### TRACE工具的使用
| 作用：清晰查看每个逻辑处理器中Goroutine的执行过程，可以很直观看出Goroutine的阻塞消耗，包含网络阻塞、同步阻塞(锁)、系统调用阻塞、调度等待、GC执行耗时、GC STW(Stop The World)耗时。

#### 基准测试场景
1. 执行基准测试，生成trace.out文件。命令如下
```
生成trace.out文件命令：
go test -benchmem -run=^$ -bench ^BenchmarkDemo_NoPool$ demo -v -count=1 -trace=trace.out 
go test -benchmem -run=^$ -bench ^BenchmarkDemo_Pool$ demo -v -count=1 -trace=trace.out 
```
2. 使用go tool的trace工具分析测试结果。命令如下：
```
go tool trace -http=127.0.0.1:8000 trace.out
```

### DLV工具的使用
| 作用：断点调试等。
#### 基准测试场景
命令行执行命令:
```
dlv debug main.go
```
进入调试，常用调试命令：

* list或l：输出代码）：list main.go:16
* （break或b：断点命令）：执行 break main.go:16 给行 GlobalVarDemo++打断点
* （continue或c：继续执行）：continue
* （print或p：打印变量）：print GlobalVarDemo
* （step或s：可以进入函数）：step

更多命令请执行 help。