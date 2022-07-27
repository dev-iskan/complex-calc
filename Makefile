composer:
	docker run --rm -it -v ${PWD}:/app composer ${command}
init:
	make composer command="install"
	make up
up:
	docker-compose --project-name complex-calc up -d
down:
	docker-compose --project-name complex-calc down