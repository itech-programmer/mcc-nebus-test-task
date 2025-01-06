up:
	docker-compose up -d

down:
	docker-compose down

build:
	docker-compose build

restart:
	docker-compose down && docker-compose up -d

logs:
	docker-compose logs -f

composer-install:
	docker-compose exec app composer install

migrate:
	docker-compose exec app php artisan migrate

seed:
	docker-compose exec app php artisan db:seed

permissions:
	sudo chmod -R 777 storage bootstrap/cache

bash:
	docker-compose exec backend bash

test:
	docker-compose exec app php artisan test