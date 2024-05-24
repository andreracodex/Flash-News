@echo off
docker stop binews-api
docker rm binews-api
docker build -t binews-api .
docker run -d -p 5000:5000 --name binews-api --network binews_sail binews-api
