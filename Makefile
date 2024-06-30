setup:
	@make build
	@make up
	@make composer-update
	@make temp-write-permission
	@make logs
build:
	docker-compose build --no-cache --force-rm
up:
	docker-compose up -d
down:
	docker-compose down
temp-write-permission:
	docker exec blog-php bash -c "chmod 777 tmp/ -Rfv"
logs:
	docker exec blog-php bash -c "mkdir logs && chmod 777 logs"
composer-update:
	docker exec blog-php bash -c "composer update"
