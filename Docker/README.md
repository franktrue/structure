# docker常用命令学习

### 镜像的拉取

```
docker pull [选项] [Docker Registry 地址[:端口号]/]仓库名[:标签]

# eg
docker pull redis
```

### 镜像的查看

```
# 查看镜像列表
docker image ls
# 查某个镜像
docker image ls 仓库名:标签
```

### 镜像的删除

