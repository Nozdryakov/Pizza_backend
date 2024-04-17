FROM ubuntu:latest
LABEL authors="artemiy"

ENTRYPOINT ["top", "-b"]