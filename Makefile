.PHONY: up down dev build init migrate fresh seed test shell tinker logs queue

init:
	cp -n src/web/.env.example src/web/.env || true
	docker compose up -d --build
	docker compose exec php php artisan migrate --seed
	docker compose exec php php artisan matchbox:create-admin
	@echo ""
	@echo "match-box is ready at http://localhost:8080"
	@echo "Admin panel at http://localhost:8080/admin"
	@echo "Default login: admin@matchbox.local / changeme"
	@echo ""
	@echo "IMPORTANT: Change the default admin password in your .env file!"

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
