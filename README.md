## Laravel Local Docker dev environment
A docker-compose workflow for local Laravel development. This includes the following containers.

* Nginx
* PHP
* MySQL
* Composer
* NPM
* Artisan

## Prerequisites
1. Make sure you have [Docker installed](https://docs.docker.com/docker-for-mac/install/) on your local machine before setting up the project.
2. [Composer](https://getcomposer.org/doc/00-intro.md)

## Creating and launching the Laravel project

* Create a Laravel project in the `src` directory.
```sh
composer create-project laravel/laravel .
```

* Make sure the MySQL credentials are matching in `./src/.env` and `docker-compose.yml` files.

* Build and run the Docker dev environment by executing the following bash file in the `root`.
```sh
./deploy-local
```

* Launch the Laravel project at `http://localhost:8080/` in your preferred browser.

# Composer and NPM

* Composer install and update
```sh
./composer-install
./composer-update
```

* NPM install and run (dev)
```sh
./npm-install
./npm-run-dev
```

# Artisan
* Artisan migrate
```sh
./artisan-migrate
```


# Bash command map
- **./deploy-local** - `docker-compose build && docker-compose up -d`
- **./composer-install** - `docker-compose run --rm composer install`
- **./composer-update** - `docker-compose run --rm composer update`
- **./npm-install** - `docker-compose run --rm npm install`
- **./npm-run-dev** - `docker-compose run --rm npm run dev`
- **./artisan-migrate** - `docker-compose run --rm artisan migrate`

Additionally you may include more commands to suite your needs.

# Containers and Ports
- **nginx** - `:8080`
- **mysql** - `:3306`
- **php** - `:9000`
- **npm**
- **artisan**






