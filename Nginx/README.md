# Nginx相关内容
包含ab测试，nginx说明配置，性能优化，Nginx集群等。
## 本集群管理为Nginx集群

启动容器	
```
# 注意确保80、8081和8082端口未被占用(或者修改docker-compose.yml中的端口)
docker-compose up -d
```

然后我们访问8081端口可以看到master，访问8082端口可以看到slave
因为我们设置了81端口的master优先级未200比82端口的slave优先级100高，所以我们访问80端口看到的是master
现在我们模仿8081端口的nginx宕机了
docker stop 8081端口nginx容器的ID
这时我们再去访问80端口看到的就是slave了


参考文档：
* <https://blog.csdn.net/m0_49558851/article/details/107786372>
* <https://www.cnblogs.com/cheyunhua/p/10670070.html>
* <https://blog.csdn.net/Dream_Weave/article/details/85166907>
* <https://www.cnblogs.com/zhhtao/p/4530592.html>