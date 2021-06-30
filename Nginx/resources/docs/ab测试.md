# 压力测试工具 ab
并发测试工具
## 参数详解
```
-n requests     Number of requests to perform
//在测试会话中所执行的请求个数。默认时，仅执行一个请求
-c concurrency Number of multiple requests to make
//一次产生的请求个数。默认是一次一个。 
-t timelimit    Seconds to max. wait for responses
//测试所进行的最大秒数。其内部隐含值是-n 50000。它可以使对服务器的测试限制在一个固定的总时间以内。默认时，没有时间限制。
-p postfile     File containing data to POST
//包含了需要POST的数据的文件. 
-T content-type Content-type header for POSTing
//POST数据所使用的Content-type头信息。
-v verbosity    How much troubleshooting info to print
//设置显示信息的详细程度 - 4或更大值会显示头信息， 3或更大值可以显示响应代码(404, 200等), 2或更大值可以显示警告和其他信息。 -V 显示版本号并退出。
-w              Print out results in HTML tables
//以HTML表的格式输出结果。默认时，它是白色背景的两列宽度的一张表。
-i              Use HEAD instead of GET
// 执行HEAD请求，而不是GET。
-x attributes   String to insert as table attributes
//
-y attributes   String to insert as tr attributes
//
-z attributes   String to insert as td or th attributes
//
-C attribute    Add cookie, eg. 'Apache=1234. (repeatable)
//-C cookie-name=value 对请求附加一个Cookie:行。 其典型形式是name=value的一个参数对。此参数可以重复。
-H attribute    Add Arbitrary header line, eg. 'Accept-Encoding: gzip'
                Inserted after all normal header lines. (repeatable)
-A attribute    Add Basic WWW Authentication, the attributes
                are a colon separated username and password.
-P attribute    Add Basic Proxy Authentication, the attributes
                are a colon separated username and password.
//-P proxy-auth-username:password 对一个中转代理提供BASIC认证信任。用户名和密码由一个:隔开，并以base64编码形式发送。无论服务器是否需要(即, 是否发送了401认证需求代码)，此字符串都会被发送。
-X proxy:port   Proxyserver and port number to use
-V              Print version number and exit
-k              Use HTTP KeepAlive feature
-d              Do not show percentiles served table.
-S              Do not show confidence estimators and warnings.
-g filename     Output collected data to gnuplot format file.
-e filename     Output CSV file with percentages served
-h              Display usage information (this message)
//-attributes 设置 属性的字符串. 缺陷程序中有各种静态声明的固定长度的缓冲区。另外，对命令行参数、服务器的响应头和其他外部输入的解析也很简单，这可能会有不良后果。它没有完整地实现HTTP/1.x; 仅接受某些'预想'的响应格式。 strstr(3)的频繁使用可能会带来性能问题，即, 你可能是在测试ab而不是服务器的性能。
```

参数很多,一般我们用 -c 和 -n 参数就可以了. 例如:

./ab -c 1000 -n 1000 http://127.0.0.1/index.html

这个表示同时处理1000个请求并运行1000次index.html文件.

## 结果说明
```
E:\WorkSpace\structure>ab -c 100 -n 1000 http://localhost:8888/index.html

Licensed to The Apache Software Foundation, http://www.apache.org/          

Benchmarking localhost (be patient)
Completed 100 requests
Completed 200 requests
Completed 300 requests
Completed 400 requests
Completed 500 requests
Completed 600 requests
Completed 700 requests
Completed 800 requests
Completed 900 requests
Completed 1000 requests
Finished 1000 requests

// 平台nginx 版本1.21.0
Server Software:        nginx/1.21.0
// 服务器主机名
Server Hostname:        localhost
// 服务器端口
Server Port:            8888

// 测试的页面文档
Document Path:          /index.html
// 文档大小
Document Length:        20 bytes

// 并发数
Concurrency Level:      100

// 整个测试持续的时间
Time taken for tests:   2.474 seconds

// 完成的请求数量
Complete requests:      1000

// 失败的请求数量
Failed requests:        0

// 整个场景中的网络传输量
Total transferred:      251000 bytes

// 整个场景中的HTML内容传输量
HTML transferred:       20000 bytes

// 大家最关心的指标之一，相当于 LR 中的 每秒事务数 ，后面括号中的 mean 表示这是一个平均值
Requests per second:    404.27 [#/sec] (mean)

// 大家最关心的指标之二，相当于 LR 中的 平均事务响应时间 ，后面括号中的 mean 表示这是一个平均值
Time per request:       247.360 [ms] (mean)

// 每个请求实际运行时间的平均值
Time per request:       2.474 [ms] (mean, across all concurrent requests)   

// 平均每秒网络上的流量，可以帮助排除是否存在网络流量过大导致响应时间延长的问题
Transfer rate:          99.09 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.3      0       1
Processing:    33  236  42.3    244     283
Waiting:       24  235  42.5    243     283
Total:         33  236  42.3    244     283


// 整个场景中所有请求的响应情况。在场景中每个请求都有一个响应时间，其中50％的用户响应时间小于244 毫秒，60％ 的用户响应时间小于250 毫秒，最大的响应时间小于283 毫秒

// 由于对于并发请求，cpu实际上并不是同时处理的，而是按照每个请求获得的时间片逐个轮转处理的，所以基本上第一个Time per request时间约等于第二个Time per request时间乘以并发请求数

Percentage of the requests served within a certain time (ms)
  50%    244
  66%    250
  75%    259
  80%    261
  90%    270
  95%    277
  98%    280
  99%    281
 100%    283 (longest request)
```
