@echo off
docker build -t binews-api .
docker run -p 5000:5000 --name binews-api binews-api