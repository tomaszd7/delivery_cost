docker-compose down
docker-compose build
docker-compose up -d
docker-compose exec -u www-data php-fpm bash