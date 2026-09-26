# My Daily Dozen

[![](https://img.shields.io/badge/community-discord-black?style=flat-square&labelColor=000&color=7289da)](https://discord.com/channels/829144774929940550/829184914757910549)
[![](https://img.shields.io/badge/sponsor-patreon-black?style=flat-square&labelColor=000&color=ff424d)](https://patreon.com/veganhacktivists)
[![](https://img.shields.io/badge/trello-vh--playground-black?style=flat-square&labelColor=000&color=026aa7)](https://trello.com/b/J3JW43mY/vh-playground)
[![](https://img.shields.io/badge/website-mydailydozen.org-black?style=flat-square&labelColor=000&color=ff0097)](https://mydailydozen.org)

Use this website to keep daily track of the foods recommended by Dr. Greger in
his New York Times Bestselling book, How Not to Die, and now his new book, How
Not to Diet! Dr. Greger’s Daily Dozen details the healthiest foods and how many
servings of each we should try to check off every day.

## Setup

Laravel 13 on PHP 8.3, run through [Laravel Sail](https://laravel.com/docs/13.x/sail),
which brings up the app, PostgreSQL and Mailpit in Docker. The front end needs
Node 22 and pnpm.

```
cp .env.example .env
composer install
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed
./vendor/bin/sail pnpm install
./vendor/bin/sail pnpm dev
```

The site is then at http://localhost and Mailpit at http://localhost:8025.
Seeding loads the food groups and, outside production, a dev login of
`vh@example.com` / `password`. Run the tests with
`./vendor/bin/sail artisan test`.

Without PHP and Composer on your machine, run that first `composer install` in a
container instead — see
[Executing Composer Commands](https://laravel.com/docs/13.x/sail#executing-composer-commands).

## Database setup

![ERD](https://camo.githubusercontent.com/90506238bb70d528c447e16573b7c1a52b2e9ef2/68747470733a2f2f692e696d6775722e636f6d2f6768595a3775652e706e67)
