# Linux 常用命令

## 文件操作

### 1. 查找[并批量操作删除]
```
find 目录 -name "正则" [| xargs rm]
# find . -name "*.tar.gz"|xargs rm
```