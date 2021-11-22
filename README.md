# Blog Minimal

<p align="left">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project

A minimal blog made with Tailwind, AlpineJS, Laravel, Livewire stack.

## Requirement and Project Environment

* Laravel 8
* PHP 8
* MySQL 8

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x/installation)

Clone the repository

```
git clone git@github.com:l3aro/blog-minimal.git
```

Switch to the repo folder

```
cd blog-minimal
```

Install all the dependencies

```
composer install
```

Copy the example env file and make the required configuration changes in the .env file

```
cp .env.example .env
```

Generate a new application key

```
php artisan key:generate
```

Run the database migrations (**Set the database connection in .env before migrating**)

```
php artisan migrate
```

Start the local development server

```
php artisan serve
```

You can now access the server at http://localhost:8000

**TL;DR command list**

```
git clone git clone git@github.com:l3aro/blog-minimal.git
cd blog-minimal
composer install
cp .env.example .env
php artisan key:generate
```

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

```
php artisan migrate
php artisan serve
```

## Database seeding

**Populate the database with seed data with relationships which includes users, blog posts. This can help you to quickly start testing couple a frontend and start using it with ready content.**

Open the DatabaseSeeder and set the property values as per your requirement

```
database/seeders/DatabaseSeeder.php
```

Run the database seeder and you're done

```
php artisan db:seed
```

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database and seed by running the following command

```
php artisan migrate:fresh --seed
```

## Dependencies

- [laravel-livewire](https://laravel-livewire.com) - Full-stack framework for Laravel that makes building dynamic interfaces simple, without leaving the comfort of Laravel.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
