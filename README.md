"# imvilla-teste" 

### System Requirements ###

* Docker-server
* PHP >= 8.1.6
* Composer

Step 1: Create and Start the container 
~~~~
    docker-compose build && docker-compose up -d
~~~~

Step 2: Build and install Laravel 
~~~~
	cd src/
    composer install
~~~~

Step 3: Migrate Laravel 
~~~~
	docker-compose exec php php /var/www/html/artisan migrate:fresh --seed
~~~~

Link:
~~~~
	http://localhost:8088
~~~~

### API ###

GET : Get all peope 
~~~~
	http://localhost:8088/api/people
~~~~

GET: Get people from given id  
~~~~
	http://localhost:8088/api/people/{id}
~~~~

GET: Get all ship orders 
~~~~
	http://localhost:8088/api/shiporders
~~~~

GET: Get people from given id  
~~~~
	http://localhost:8088/api/shiporders/{id}
~~~~


### Unit Test ###

~~~~
	docker-compose exec php php /var/www/html/vendor/bin/phpunit
~~~~