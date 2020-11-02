init:
	docker network create pripla
	docker-compose build --no-cache
	docker-compose up -d
	docker-compose exec php composer install
	docker-compose exec php cp .env.dev .env
	docker-compose exec php php artisan key:generate
	# make db

up:
	docker-compose up -d

down:
	docker-compose down

ps:
	docker-compose ps

sh:
	docker-compose exec php bash

db:
	docker-compose exec php php artisan migrate:fresh --seed

tinker:
	docker-compose exec php php artisan tinker
