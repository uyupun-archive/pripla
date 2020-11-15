.PHONY: up down prod-down ps db lint

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
	yarn
	cd front && rm -rf .nuxt
	cd front && rm -rf dist
	cd front && yarn build
	cd front && docker-compose -f docker-compose-prod.yml up -d

prod-down:
	-docker-compose down
	-cd front && docker-compose -f docker-compose-prod.yml down

ps:
	docker-compose ps
	cd front && docker-compose -f docker-compose-prod.yml ps

db:
	docker-compose exec php php artisan migrate:fresh --seed

lint:
	cd front && yarn lint --fix
