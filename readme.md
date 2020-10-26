<h4 align="center">Welcome to My Daily Dozen 👋</h4>

![CI](https://github.com/veganhacktivists/mydailydozen/workflows/CI/badge.svg)

> A web based application inspired by the [Daily Dozen app](https://github.com/nutritionfactsorg/daily-dozen-ios).

### 🏠 [Homepage](https://mydailydozen.org)

Note: we are not affiliated with the original team, the app is non-commercial and free to use, and we accept issues and pull requests.
If you find this interesting or useful [check us out](https://veganhacktivists.org).

### Contributing

This is maintained by Team Broccoli at the Vegan Hacktivists.

If you'd like to help out, the single biggest thing you could do is make an account on [MyDailyDozen](https://mydailydozen.org) and make a Trello card for anything you could think of being improved.

If you have an hour or two free and want to help out more, feel free to set up the project and make a PR for an open Trello card.

Huge thanks to everyone who has contributed or participated in this project. [A lot of people](https://veganhacktivists.org/team) have done a massive amount to get this to where it is in varying capacities. If you aren't on there and would like to be, send us an email or message us on Discord.

### Setting up the Project

This is a Laravel project using Yarn, Tailwind, Alpine, etc.

The easiest way to get this running for people working with us that we've found:

[Docker Desktop](https://www.docker.com/products/docker-desktop):

```bash
git clone git@github.com:veganhacktivists/mydailydozen.git
cd mydailydozen
cp .env.docker .env
git submodule update --init laradock
cd laradock
docker-compose exec workspace bash
composer install
php artisan migrate
php artisan db:seed
yarn install
yarn run watch
```

If you get stuck with the Docker try [here](https://laradock.io/getting-started/) or message on Discord.

There's a lot of ways to run Laravel. There's a lot of pluses and minuses to each. Here's some other options:
- [Vagrant / Homestead](https://laravel.com/docs/8.x/homestead)
- [Mac](https://laravel.com/docs/8.x/valet)
- [Linux](https://cpriego.github.io/valet-linux/)
- [Windows Alternative](https://www.apachefriends.org/download.html)

![ERD](https://camo.githubusercontent.com/90506238bb70d528c447e16573b7c1a52b2e9ef2/68747470733a2f2f692e696d6775722e636f6d2f6768595a3775652e706e67)
