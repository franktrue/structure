FROM openjdk:8-jdk-stretch

COPY ./Mycat-server-1.6.5-release-20180122220033-linux.tar.gz /usr/local
RUN cd /usr/local && tar -zxvf Mycat-server-1.6.5-release-20180122220033-linux.tar.gz && ls -lna

ENV MYCAT_HOME=/usr/local/mycat
ENV PATH=$PATH:$MYCAT_HOME/bin

WORKDIR $MYCAT_HOME/bin

ENV TZ Asia/Shanghai

EXPOSE 8066 9066

CMD ["/usr/local/mycat/bin/mycat", "console","&"]
