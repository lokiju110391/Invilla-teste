"# imvilla-teste" 

docker-compose build && docker-compose up -d

docker-compose exec php php /var/www/html/artisan migrate


docker-compose exec php php /var/www/html/artisan migrate:fresh --seed



php artisan make:controller NavegationController

php artisan make:controller ProcessController
