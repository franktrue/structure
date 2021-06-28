# 架构学习
| 总结架构学习中的点滴

## 前期准备
### Docker环境
#### 为什么基于Docker搭建？

* 资源有限
* 虚拟机搭建对机器配置有要求，并且安装mysql步骤繁琐
* 一台机器上可以运行多个Docker容器
* Docker容器之间相互独立，有独立ip，互不冲突
* Docker使用步骤简便，启动容器在秒级别

#### 创建公有网络app
方便各个Docker compose集群之间网络共享
```
docker network create -d bridge app
```

## 一. 常用的设计模式以及使用场景
工厂，单例，策略，注册，适配，观察者，原型，装饰器，facade，loc，pipeline

## 二. 阅读一个框架源码

* Laravel
* Symfony
* EasyPHP (建议从这个简单的开始)

## 三. 常用利器优化
### 1. MYSQL性能优化

* 理解底层btree机制
* 理解sql执行
* 索引优化
* 慢查询与sql优化
* mysql主从以及读写分离
* mysql分表策略以及意义
* 数据库中间件

### 2. Redis优化使用

* redis的特点
* redis的工作流
* redis数据类型以及适用场景
* redis内存分配
* redis主从快照等
* redis批量操作优化

### 3. Nginx性能

* nginx详解
* nginx配置
* nginx机制
* nginx集群
* nginx原理
* nginx扩展-可以基于openresty做扩展开发

### 4. php性能

* 是否优雅的创建对象
* 类的设计陷阱
* 程序设计规范
* php垃圾回收机制
* php-fpm相关
* php源码

## 四. 微服务

### 1. Swoole

* swoole基础
* swoole进程模型
* task异步任务，任务迟
* server服务器
* 数据库连接池
* 多进程
* 协程

### 2. Api接口

* api架构设计
* api接口实现
* api接口扩展能力
* api自动生成文档（可自己配置wiki平台）
* api性能调优

### 3. swoft微服务框架

* 微服务设计模式
* 路由网关
* 客户端负载均衡
* conful服务治理
* RPC
* 微服务治理环节
* 微服务监控
* 容灾

## 五. 工程化

### 1. linux 操作 各种命令操作
### 2. python或shell脚本编写
### 3. composer的使用
### 4. git的使用  gitlab或gogs

## 六.基础架构

### 1. 分布式架构原理

* 分布式初始化
* 分布式架构设计原则
* 分布式通讯技术
* 分布式协议

### 2. 分布式缓存

* redis主从原理
* redis分布式集群部署
* redis数据一致性问题
* redis读写分离
* redis哨兵
* redis常见问题以及优化
* redis缓存击穿以及雪崩预防策略

### 3. 分布式rpc

* IO的概念
* 多协议通讯
* 并发处理
* rpc框架

### 4. 消息中间件 redis，kafka等熟悉，以及判断适用场景

## 七. 压力测试工具
ab，jmeter，LoadRunner，wrk  我使用比较多的是jmeter

## 八. 其他语言的学习
golang，lua等

---
doing……

---
转载请注明来源