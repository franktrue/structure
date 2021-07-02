FROM nginx

ARG TZ="Asia/Shanghai"

ENV TZ ${TZ}

COPY keepalived/  /etc/keepalived
COPY docker-entrypoint-n.sh /

RUN apt-get update  \
    && apt-get install -y keepalived \
    && apt install -y procps \
    && chmod +x /etc/keepalived/chk_nginx.sh \
    && chmod +x /docker-entrypoint-n.sh

ENTRYPOINT ["/docker-entrypoint-n.sh"]

CMD ["nginx", "-g",  "daemon off;" ]
