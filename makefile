include .env

CONTAINER_NAME="questions_server_side_application"

docker-run:
	- docker-compose -p questions-manager-project --env-file .env up -d
update-schema:
	- php /var/www/work-directory/bin/doctrine orm:schema-tool:update --dump-sql --force
set-up-database:
ifeq ($(ENVIRONMENT), "PROD")
	$(error "Should be executed on DEV")
else
	- php /var/www/work-directory/bin/doctrine orm:schema-tool:create
endif