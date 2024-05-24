@echo off
docker rm binews-api
docker build -t binews-api .
docker run -p 5000:5000 --name binews-api --network binews_sail binews-api