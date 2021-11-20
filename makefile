CONTAINER_NAME="questions_server_side_application"

docker-run:
	- docker-compose -p questions-manager-project up -d
composer-install:
	- docker exec -it $(CONTAINER_NAME) /bin/sh -c "composer install"
update-schema:
	- docker exec -it $(CONTAINER_NAME) /bin/sh -c "php /var/www/work-directory/bin/doctrine orm:schema-tool:update --dump-sql --force"