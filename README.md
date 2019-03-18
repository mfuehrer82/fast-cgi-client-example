# fast-cgi-client-example

## Environment

* nginx/1.10.0
* PHP 7.2
	+ php-fpm
	+ xdebug 
	
## Domains
 
* [local](http://localhost:8080/)

## Installation

### Requirements

* [Docker](https://www.docker.com/get-docker)  

### Setup

- Open docker/php/xdebug.ini and replace ${HOST_IP} with your host IP.
- Set IDE xdebug port to 10000.
- Set IDE maximum simultaneous connection to 3 (or higher).   

### Installation 

	docker-compose up --build -d
    
## Restart
	docker-compose up -d --force-recreate  
