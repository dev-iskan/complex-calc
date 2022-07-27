composer:
	docker run --rm -it -v ${PWD}:/app composer ${command}
up:
	docker-compose --project-name complex-calc up -d
down:
	docker-compose --project-name complex-calc down