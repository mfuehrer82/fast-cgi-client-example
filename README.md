# fast-cgi-client-example

## Environment

* nginx/1.10.0
* PHP 7.1
	+ php-fpm
	+ xdebug 
	
## Domains
 
* [local](http://localhost:8080/)

## Installation

### Requirements

* [Docker](https://www.docker.com/get-docker)  


### Installation 

	docker pull prooph/composer:7.1
    docker-compose up --build -d
    docker run --rm -it --volume $(pwd):/app prooph/composer:7.1 install -o --prefer-dist
    
### Configuration 

	docker exec -it app /bin/bash        
## Tests

## Restart
	docker-compose stop && docker-compose rm -f && docker-compose up -d   
## Composer Update

	docker run --rm -it --volume $(pwd):/app prooph/composer:7.1 install -o --prefer-dist
## Rebuild

	docker-compose up --build
