RabbitMQ tutorial for PHP
---

## Installation
- `cp .env.example .env`
- Populate the required environment variables.
- `mkdir volume`
- `sudo chown -R 1001:1001 ./volume`
- It comes with docker. 
  - `docker-compose up -d --build` to run docker detached
  - `docker-compose up --build` to keep track of the logs
- `docker-compose run --rm --user="${UID}:$(id -g)" --entrypoint=composer artisan install`
- `docker-compose run --rm artisan <command to run>`


## Available commands
**Adding `--auto` to all the following commands will not ask for message, exchange, queue, routing and binding key. Or empty values for the prompted questions will fill up data automatically.**
 
- `docker-compose run --rm artisan default:publisher`
- `docker-compose run --rm artisan direct:publisher`
- `docker-compose run --rm artisan direct:publisher`
- `docker-compose run --rm artisan topic:publisher`
- `docker-compose run --rm artisan header:publisher`
