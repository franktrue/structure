# Nginx配置
| 配置修改完成后需重启nginx配置
##  常用配置说明
```
#########  每个指令必须有分号结束。#################
user  Nginx;  #配置用户或者组，默认为nobody nobody。
worker_processes 4;  #允许生成的进程数，默认为1
#pid / Nginx/pid/ Nginx.pid;   #指定 Nginx进程运行文件存放地址
error_log /var/log/ Nginx/error.log debug;  #制定日志路径，级别。这个设置可以放入全局块，http块，server块，级别以此为：debug|info|notice|warn|error|crit|alert|emerg
events {
    accept_mutex on;    # 设置网路连接序列化，防止惊群现象发生，默认为on
    multi_accept on;    # 设置一个进程是否同时接受多个网络连接，默认为off
    #use epoll;         # 事件驱动模型，select|poll|kqueue|epoll|resig|/dev/poll|eventport
    worker_connections  1024;    #最大连接数，默认为512
}
http {
    include       mime.types;   #文件扩展名与文件类型映射表
    default_type  application/octet-stream; #默认文件类型，默认为text/plain
    #access_log off; #取消服务日志    
    log_format myFormat '$remote_addr–$remote_user [$time_local] $request $status $body_bytes_sent $http_referer $http_user_agent $http_x_forwarded_for'; #自定义格式
    access_log /var/log/ Nginx/access.log myFormat;  #combined为日志格式的默认值
    sendfile on;   #允许sendfile方式传输文件，默认为off，可以在http块，server块，location块。
    sendfile_max_chunk 100k;  #每个进程每次调用传输数量不能大于设定的值，默认为0，即不设上限。
    keepalive_timeout 65;  #连接超时时间，默认为75s，可以在http，server，location块。

    # upstream mysvr {   
    #   server 127.0.0.1:7878;
    #   server 192.168.10.121:3333 backup;  #热备
    # }
    # error_page 404 https://www.baidu.com; #错误页
    # server {
    #     keepalive_requests 120; #单连接请求上限次数。
    #     listen       4545;   #监听端口
    #     server_name  127.0.0.1;   #监听地址       
    #     location  ~*^.+$ {       #请求的url过滤，正则匹配，~为区分大小写，~*为不区分大小写。
    #        #root path;  #根目录
    #        #index vv.txt;  #设置默认页
    #        proxy_pass  http://mysvr;  #请求转向mysvr 定义的服务器列表
    #        deny 127.0.0.1;  #拒绝的ip
    #        allow 172.18.5.54; #允许的ip           
    #     } 
    # }
    gzip on;  # 开启压缩
    # gzip_min_length 1k;   # 设置压缩最小单位，小于不压缩
    # gzip_disable "msie6";
    # gzip_static off       #  Nginx对于静态文件的处理模块,可提前压缩静态文件为.gz结尾节省CPU压缩消耗

    # gzip_vary on;
    # gzip_proxied any;
    # gzip_comp_level 4;    # 压缩比
    # gzip_buffers 4 16k;  
    # gzip_http_version 1.1;
    # gzip_types text/plain text/css application/json application/javascript text/xml application/xml application/xml+rss text/javascript;  压缩内容

    include /etc/ Nginx/conf.d/*.conf;
}

```

##  location路径映射
```
优先级关系：
(location = ) > (location /xxx/yyy/zzz) > (location ^~) > (location ~,~*) > (location /起始路径) > (location /)
```

```
# 1. = 匹配
location / {
	#精准匹配，主机名后面不能带任何字符串
	#例如www.baidu.com不能是www.baidu.com/id=xxx
}
```

```
# 2. 通用匹配
location /xxx {
	#匹配所有以/xxx开头的路径
	#例如127.0.0.1:8080/xxx	xxx可以为空，为空则和=匹配一样
}
```

```
# 3. 正则匹配
location ~ /xxx {
	#匹配所有以/xxx开头的路径
}
```

```
# 4. 匹配开头路径
location ^~ /xxx/xx {
	#匹配所有以/xxx/xx开头的路径
}
```

```
# 5. 匹配结尾路径
location ~* \.(gif/jpg/png)$ {
	#匹配以.gif、.jpg或者.png结尾的路径
}
```

##  Nginx负载均衡配置
Nginx为我们默认提供了三种负载均衡的策略：
###  轮询
将客户端发起的请求，平均分配给每一台服务器
想实现Nginx轮询负载均衡机制只需要修改配置文件如下
```
upstream 名字{
    server ip:端口;
    server 域名:端口;
    server 域名:端口 backup;    # 热备，备用服务
}
server {
    listen       80;
    listen  [::]:80;
    server_name  localhost;

	location / {
        proxy_pass http://upstream的名字/;	
    }
}
```

###  权重
会将客户端的请求，根据服务器的权重值不同，分配不同的数量
实现权重的方式：在配置文件中upstream块中加上weight
```
upstream 名字{
    server ip:端口 weight=1;
    server 域名:端口 weight=2;
}
server {
    listen       80;
    listen  [::]:80;
    server_name  localhost;

	location / {
        proxy_pass http://upstream的名字/;	
    }
}
```

###  ip_hash
基于发起请求的客户端的ip地址不同，他始终会将请求发送到指定的服务器上就是说如果这个客户端的请求的ip地址不变，那么处理请求的服务器将一直是同一个
实现ip_hash方式：在配置文件upstream块中加上ip_hash;
```
upstream 名字{
    ip_hash;        # 此处加ip_hash
    server ip:端口 weight=1;
    server 域名:端口 weight=2;
}
server {
    listen       80;
    listen  [::]:80;
    server_name  localhost;

	location / {
        proxy_pass http://upstream的名字/;	
    }
}
```

## 动态资源代理配置
Nginx通过动静分离来提升Nginx的并发能力，更快的给用户响应
```
# 配置如下
location / {
  proxy_pass 路径;
}
```

## 静态资源代理配置
```
#配置如下
location / {
    root 静态资源路径;
    index 默认访问路径下的什么资源;
    autoindex on;#代表展示静态资源的全部内容，以列表的形式展开
}
```