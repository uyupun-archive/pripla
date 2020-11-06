.PHONY: up down ps sh db tinker lint

setup:
	# Frontend
	cd front && yarn install
	cp .env.example .env
	cd ../
	# Backend
	cp .env.example .env
	docker network create pripla
	docker-compose build --no-cache
	docker-compose up -d
	docker-compose exec php composer install
	docker-compose exec php php artisan key:generate
	make db

up:
	docker-compose up -d
	cd front && yarn dev

down:
	docker-compose down

prod-up:
	docker-compose up -d
	cd front && yarn build
	cd front && nohup yarn start > /dev/null 2>&1 &

prod-down:
	-docker-compose down
	-kill `lsof -i :3001 | awk '$$1 == "node" { print $$2 }'`

ps:
	docker-compose ps

sh:
	docker-compose exec php bash

db:
	docker-compose exec php php artisan migrate:fresh --seed

tinker:
	docker-compose exec php php artisan tinker

lint:
	cd front && yarn lint --fix
