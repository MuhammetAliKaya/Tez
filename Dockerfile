FROM docker.io/bitnami/laravel:10

COPY ./run.sh /tmp    
ENTRYPOINT ["/tmp/run.sh"]