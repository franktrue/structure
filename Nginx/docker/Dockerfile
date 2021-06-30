# keepalived+nginx
FROM nginx

RUN apt-get update && apt-get upgrade

RUN apt-get install -y bash curl ipvsadm iproute2 openrc keepalived

COPY ["./entrypoint.sh", "/opt/entrypoint.sh"]

RUN chmod +x /opt/entrypoint.sh

CMD ["/opt/entrypoint.sh"]
