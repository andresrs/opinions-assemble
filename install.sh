#!/bin/bash

composer install

if [ ! -f ./.env ]
then
  cp .env.example .env
  php artisan key:generate
fi

echo
echo "Setting some of the default values."
declare -a SEARCH_STRINGS=("APP_URL" "DB_HOST" "DB_PORT" "DB_DATABASE" "DB_USERNAME" "DB_PASSWORD")
for SEARCH in "${SEARCH_STRINGS[@]}"
do
  DEF_VALUE=$(egrep -ir "^${SEARCH}=" ./.env | sed "s;.*=;;")
  read -p "${SEARCH} [default: ${DEF_VALUE}]: " VALUE
  VALUE=${VALUE:-$DEF_VALUE}
  sed -i "s;^${SEARCH}=.*$;${SEARCH}=${VALUE};" .env;
done
echo

php artisan optimize
php artisan migrate

echo
echo "Verify the .env file and update as necessary."