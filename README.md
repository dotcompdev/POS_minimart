# core-lamp

LAMP docker image which it purpose to accomodate specific for dotcomp_dev web app development. This has been modified from mattrayner/docker-lamp:1804 image based on phusion/baseimage:0.11.

build the image:
 docker build -t=okynuie/core-lamp:latest -f ./Dockerfile .

run the image:
docker run -d -p "81:80" -p "3306:3306" --name container_name -v ${PWD}/app:/app okynuie/core-lamp:latest
