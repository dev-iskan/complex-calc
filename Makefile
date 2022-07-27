composer:
	docker run --rm -it -v ${PWD}:/app composer ${command}
run:
	docker run --rm -it -v ${PWD}:/app -w /app php:8.0-cli-alpine php index.php