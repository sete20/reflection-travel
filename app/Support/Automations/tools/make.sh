#!/usr/bin/env bash

echo "syncing git hooks";
git config core.hooksPath ./app/Support/Automations/.githooks


if [ ! -f ".env" ];then
    echo ".env file not found trying to copy from .env.example";
    cp .env.example .env;
fi

echo "Generating project key";
php artisan key:generate;

echo "Installing Composer dependencies";
composer install --no-interaction  --no-ansi;

#todo add promp to take database info
