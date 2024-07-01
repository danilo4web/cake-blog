setup:
	@make prepare
	@make build
	@make up
	@make composer-update
	@make temp-write-permission
	@make logs
prepare:
	cp .env.example .env
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
test:
	docker exec blog-php bash -c "composer test tests/TestCase/Controller/Api/TagsControllerTest.php"
	docker exec blog-php bash -c "composer test tests/TestCase/Controller/Api/CategoriesControllerTest.php"
	docker exec blog-php bash -c "composer test tests/TestCase/Controller/Api/UsersControllerTest.php"
	docker exec blog-php bash -c "composer test tests/TestCase/Controller/Api/PostsControllerTest.php"
	docker exec blog-php bash -c "composer test tests/TestCase/Model/Table/TagsTableTest.php"
	docker exec blog-php bash -c "composer test tests/TestCase/Model/Table/CategoriesTableTest.php"
	docker exec blog-php bash -c "composer test tests/TestCase/Model/Table/UsersTableTest.php"
	docker exec blog-php bash -c "composer test tests/TestCase/Model/Table/PostsTableTest.php"
