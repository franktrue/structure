#!/bin/sh
# /usr/sbin/keepalvined -n -l -D -f /etc/keepalived/keepalived.conf --dont-fork --log-console &
/usr/sbin/keepalvined -D -f /etc/keepalived/keepalived.conf

# Docker 容器启动时，默认会把容器内部第一个进程，也就是pid=1的程序，作为docker容器是否正在运行的依据，如果 docker 容器pid=1的进程挂了，那么docker容器便会直接退出。
# nginx默认是以后台模式启动的，Docker未执行自定义的CMD之前，nginx的pid是1，执行到CMD之后，nginx就在后台运行，bash或sh脚本的pid变成了1。所以一旦执行完自定义CMD，nginx容器也就退出了。为了保持nginx的容器不退出，应该关闭nginx后台运行
nginx -g "daemon off;"
