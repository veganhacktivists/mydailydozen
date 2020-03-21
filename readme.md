# Hello, world

If you find any errors in the documentation, or if something doesn't work on your computer (e.g. the git hooks), let Gerard or another project leader know.

1. [High priority information (READ THIS)](#high-priority-information-read-this)
1. [Useful development tips](#useful-development-tips)
1. [Admin panel](#admin-panel)
1. [Mail](#mail)
1. [Database seeding](#database-seeding)
1. [(Optional) IDE Helper](#optional-ide-helper)
1. [Low priority info](#low-priority-info)
1. [Recommendations](#recommendations)

## High priority information (READ THIS)

If you don't read this section _at a minimum_, Gerard is going to be very angry with you.

### Project/environment setup

#### Homestead

Please use [Laravel Homestead](https://laravel.com/docs/6.0/homestead). It's a pre-configured virtual machine that includes _everything_ you would ever need to run a Laravel app. It's got MySQL, PostgreSQL, Node, PHP, Nginx, Redis, and other things installed on it already. No server configuration necessary. It's cross-platform, so you have no excuse not to use it.

We don't want to see you using something like WAMP/MAMP or any of that. If you want to be a hero and set up everything up individually on your personal machine, we can't stop you, but you will receive zero help from us if something isn't working. Please make your life easier and use Homestead.

#### Local machine

You will need to set a couple things up on your local machine (outside of Homestead):

* [`yarn`](https://yarnpkg.com/lang/en/) - Please install this. **We do not use `npm` for Vegan Hacktivist projects. If you use `npm`, we will find out and be angry.**
* [Editorconfig](https://editorconfig.org/) - Please set up your preferred editor to respect EditorConfig files. This should be as simple as installing a plugin if your editor doesn't support it out of the box. **This is crucial in order to make sure that our code is formatted consistently.**

**Important:** In order to run the project, make sure Homestead is running and set up correctly. On your local machine, run `yarn watch` in the root directory of the project. **This must be done on your local machine, otherwise the file watcher will not work.** Everything else should be done in the virtual machine (e.g. using `composer`, `php artisan`, etc.).

#### Bootstrap

Lastly*, we use [Bootstrap](https://getbootstrap.com/) for our projects. Do your absolute best to avoid writing custom CSS. This makes it easier to keep everything consistent and allows us to easily theme Bootstrap later on.

**Important:** It seems that most people are unaware of Bootstrap's [utility classes](https://getbootstrap.com/docs/4.3/utilities/borders/). These allow you to do things like add margins and padding, change colors, etc. without writing custom CSS. 99% of what you want to do can be accomplished with these, so please take time to look at them.

\* You better read the rest of the docs.

## Useful development tips

### HTML / Form Blade helpers

If you are to code either of the following:

* A hyperlink
* A form

Please use the [LaravelCollective helpers](https://github.com/LaravelCollective/docs/blob/master/html.md) if possible. They make things much nicer and easier. If you don't use these, your code reviews are going to take longer because we'll make you rewrite your code.

### Custom blade helpers

Please check out the [`view-helpers.php`](bootstrap/view-helpers.php) file for some functions that'll help you out in Blade templates.

If you want to add more, feel free to add them to this file.

### Adding JavaScript functionality

With the introduction of [Laravel Livewire](https://livewire-framework.com/), there is a bunch of functionality we can add to our apps without writing custom JS. **If you want to add any AJAX functionality, please attempt to use Livewire instead of writing jQuery spaghetti code.**

Livewire is turned off by default as most projects won't need it, but it can be enabled in [`config/base.php`](config/base.php).

We will almost certainly never built a single-page app with something like React or Vue; there is far too much overhead required, and for the apps we're building, they're not worth the trouble.

### Debugging with Clockwork

[Clockwork](https://github.com/itsgoingd/clockwork) is a really cool package that allows you to see useful information (e.g. SQL queries) inside your browser's developer tools. You can also use it for logging things, rather than using Laravel's built-in `Log` facade which inconveniently writes to a file.

All you need to do is download the [Chrome](https://chrome.google.com/webstore/detail/clockwork/dmggabnehkmmfmdffgajcflpdjlnoemp) or [Firefox](https://addons.mozilla.org/en-US/firefox/addon/clockwork-dev-tools/) extension and it should work!

### Git Hooks

Ideally, you won't need to do anything here. However, just know that when you run `composer install`, git hooks will be set up automatically for you.

There is a pre-commit hook to format your PHP code according to the configuration specified in [`.php_cs`](.php_cs) and your JS code according to the [`.prettierrc`](.prettierrc). **This doesn't mean you don't need the Editorconfig setup. Please still use that.**

There is also a post-merge hook (this gets run after a `git pull`) which will automatically run `composer install` and `yarn` in order to install any packages that may have been installed in recent commits. **Note: If a new JS package gets installed, you will need to rerun `yarn watch`.**

## Admin panel

We are using [Laravel Backpack](https://backpackforlaravel.com). Please refer to their documentation on how to add functionality to what already exists.

In order to access the admin panel, a user must have the `admin` role attached. For information on how to do this for the first user(s) on the website, please refer to the section on [database seeding](#database-seeding).

## Mail

There are a few different parts of the application where mail is used. In order to test any mail functionality locally, it is strongly recommended that you sign up for a free account on [Mailtrap](https://mailtrap.io).

Afterwards, modify your `.env` file to include the credentials they give you. The environment variables are `MAIL_USERNAME` and `MAIL_PASSWORD`. Emails will be sent to Mailtrap for your viewing rather than actually being emailed out.

In production, we have a SendGrid account to handle sending emails. The project leaders have access to this and should be responsible for setting this up on the production server.

### Email verification

No additional setup is required beyond what's stated above.

### Contact form

This is the simplest of the mail-related functionality. In the `.env` file, set `MAIL_RECIPIENT` to whatever email address should receive mail through the contact form. This can be comma-separated to include multiple emails.

### Error logging

In production, set `ERROR_LOG_MAIL_SENDER` and `ERROR_LOG_MAIL_RECIPIENT` in the `.env` file. We use [LogEnvelope](https://github.com/Cherry-Pie/LogEnvelope) to email us whenever an error occurs on the server.

If you want to turn this off in production for some reason (not recommended), this can be done in [`config/base.php`](config/base.php).

You shouldn't need this in development, but if you really want to, then set the above `.env` variables and then change the `APP_DEBUG` environment variable to `false`. Alternatively, you can force it to be enabled in [`config/yaro.log-envelope.php`](config/yaro.log-envelope.php), but just make sure not to commit the change.

### Mailchimp newsletter

As part of our signup (and in user settings), a user can choose to be added to or removed from our mailing list.

In production, setup is as easy as setting the `MAILCHIMP_API_KEY` and `MAILCHIMP_AUDIENCE_ID` environment variables to the ones we use for all of our projects. This is for the project leader to do.

In development, you'll need to sign up for a Mailchimp account and set those same variables. This probably isn't required unless you really want to test or change the functionality.

## Database seeding

### Development

Simply run `php artisan db:seed` after running migrations.

### Production

This is only to be done by a project leader, and should ideally only be done _once_. Be careful.

On the production server, run `php artisan db:seed:prod`.

This will run the [`SeedProduction`](app/Console/Commands/SeedProduction.php) command. By default, it creates an admin role and then creates an admin user. The script prompts you for the admin user's name, email, and password.

If you wish to create additional roles for the application, then add them to the `$roleNames` variable in the `seedRoles()` method.

The file also contains a method called `seedCustomData()`. Use this if you wish to seed production with any additional data.

**Please test this script out locally on a completely wiped database before running it in production. Once it's run, it's annoying to un-seed things in order to re-run the script!**

## (Optional) IDE Helper

The [Laravel IDE Helper](https://github.com/barryvdh/laravel-ide-helper) is installed as a dev dependency for those who use PHPStorm. For now, please limit its usage to the Facade auto-complete/intellisense feature.

To enable this feature in your local environment, run `php artisan ide-helper:generate`

Note that this command will only register Facades that are already in the project. If new Facades are added later and you
notice that PHPStorm doesn't recognize them, run the command again.

## Low priority info

This will hopefully never affect you, but there are some installed packages which are worth noting:

* [Turbolinks](https://github.com/turbolinks/turbolinks) - This turns the app into a faux single-page app by handling navigation with AJAX in order to prevent reloads across pages. It can be turned off in [`config/base.php`](config/base.php).
* [Caffeine for Laravel](https://genealabs.com/docs/laravel-caffeine/) - This prevents forms from "timing out" if a user has been on a page for a long time.
* [Secure Headers](https://github.com/BePsvPT/secure-headers) - This implements a bunch of security-related headers in our responses. Apparently, it's a good thing to do.

## Recommendations

There is some tried-and-true software out there which we've had success with. By using the same software across projects, our lives are made easier when it comes time to help, debug, code review, and perform updates.

Below are some veterans:

* [SimpleMDE Markdown Editor](https://simplemde.com/) - If you want to add a Markdown editor to the app, please use this library.
* [Laraberg editor for a super complete page/document editor](https://github.com/VanOns/laraberg) - Laraberg is a wrapper around the Gutenberg editor (this is WordPress's editor) built specifically for Laravel. It is incredible and you should use it if you need rich text functionality, custom formatting, image/video embedding, etc.
