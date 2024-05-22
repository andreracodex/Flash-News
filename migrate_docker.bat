@echo off
REM Step 1: Access the Docker container
REM Laugh LOL
color 0a
cd docker
type doh.txt
docker exec -it binews-frontend-1 sh -c "cd /var/www/html/ && php artisan migrate:fresh --seed"
pause
