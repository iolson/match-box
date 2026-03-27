.PHONY: up down dev build migrate fresh seed test shell tinker logs queue

up:
	docker compose up -d

down:
	docker compose down

dev:
	docker compose --profile dev up -d

build:
	docker compose build

migrate:
	docker compose exec php php artisan migrate

fresh:
	docker compose exec php php artisan migrate:fresh --seed

seed:
	docker compose exec php php artisan db:seed

test:
	docker compose exec php php artisan test

coverage:
	docker compose exec php php artisan test --coverage --min=85

shell:
	docker compose exec php sh

tinker:
	docker compose exec php php artisan tinker

logs:
	docker compose logs -f

queue:
	docker compose exec php php artisan queue:work

composer-install:
	docker compose exec php composer install

npm-install:
	docker compose exec vite npm install

npm-build:
	docker compose exec php npm run build
