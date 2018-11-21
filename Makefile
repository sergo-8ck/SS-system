docker-up: memory
	docker-compose up -d

docker-down:
	docker-compose down

docker-build: memory
	docker-compose up --build -d

test:
	docker-compose exec php-cli vendor/bin/phpunit

assets-install:
	docker-compose exec node yarn install

assets-rebuild:
	docker-compose exec node npm rebuild node-sass --force

assets-dev:
	docker-compose exec node yarn run dev

assets-watch:
	docker-compose exec node yarn run watch

queue:
	docker-compose exec php-cli php artisan queue:work

cache:
	docker-compose exec php-cli php artisan config:cache
route:
	docker-compose exec php-cli php artisan route:clear
config:
	docker-compose exec php-cli php artisan config:clear
cache:
	docker-compose exec php-cli php artisan cache:clear

searchinit:
    docker-compose exec php-cli php artisan search:init
searchreindex:
    docker-compose exec php-cli php artisan search:reindex

sysctl:
    sudo sysctl -w vm.max_map_count=262144

seed:
docker-compose exec php-cli php artisan db:seed

memory:
	sudo sysctl -w vm.max_map_count=262144

perm1:

	sudo chgrp -R www-data storage bootstrap/cache
perm2:
	sudo chmod -R ug+rwx storage bootstrap/cache