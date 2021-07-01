#!/bin/bash
run=`ps -C nginx --no-header | wc -l`
if [ $run -eq 0 ]; then
    service nginx start
    sleep 3
    if [ `ps -C nginx --no-header | wc -l` -eq 0 ]; then
        service keepalived stop
    fi
fi
