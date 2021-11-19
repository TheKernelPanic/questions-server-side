docker-run:
	- docker-compose -p questions-manager-project up -d
composer-install:
	- docker exec -it questions_server_side_application /bin/sh -c "composer install"