.PHONY: up down init

up:
	docker-compose up -d

down:
	docker-compose down

init: up
	docker exec -it php_app composer install
	docker exec -it php_app vendor/bin/doctrine orm:schema-tool:create