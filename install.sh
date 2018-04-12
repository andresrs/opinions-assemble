#!/bin/bash

composer install

if [ ! -f ./.env ]
then
  cp .env.example .env
fi

php artisan key:generate
php artisan optimize
php artisan migrate
