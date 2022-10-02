.DEFAULT_GOAL := restart

init: docker-down-clear \
	  docker-pull docker-build docker-up \
	  sdk-init

docker-down-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull

docker-build:
	docker-compose build

sdk-composer-install:
	docker-compose run --rm php-cli composer install

sdk-init: sdk-composer-install sdk-copy-env

sdk-copy-env:
	cp .env.example .env

sdk-test:
	docker-compose run --rm php-cli composer test

sdk-shell:
	docker-compose run --rm php-cli bash
