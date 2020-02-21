- [Github Repository](https://github.com/rnottinger/relationship-types)

# Description

- I wanted a single **Laravel project** 
	+ that I could use to learn how to use different laravel features 
		* as I'm working my way through 
			- the Laravel documentation.
	+ I am attempting to focus on each feature at a time
		* therefore most of the code is as basic as possible 
			- to demo the specific feature
			- or describe the workflow 
				+ to use the specific feature
- This project does not attempt to focus on frontend development
	+ only minimum basic frontend development will be implemented using bootstrap framework 
- I accept no originality within this **Laravel project**
	+ The majority of the content was copied directly from the Laravel Documentation
	+ and is only used for demonstrating & learning purposes 
		* Its cool with me if you fork this repo, copy any code, etc. 

# Review

- auth has been implemented using bootstrap
- the **project root** route '/' contains links 
	+ to view the output 
		* of specific laravel features
- `php artisan route:list`
	+ Each **collection method** [documented](https://laravel.com/docs/master/collections) 
		* has a route closure in `routes/web.php`
	+ Each **relationship type** 
		* has a route closure in `routes/web.php`

# Install

- Prerequisites 
	+ mac users [valet installation](https://laravel.com/docs/6.x/valet#installation)
		- PHP
		- [Composer](https://getcomposer.org/)
		- [Homebrew](https://brew.sh/)
		- MySQL
		- [Valet](https://laravel.com/docs/6.x/valet)
			+ `mkdir ~/Sites`
			+ `cd ~/Sites`
			+ `valet park`
	+ `node` & `npm`
- `cd ~/Sites`
- `git clone https://github.com/rnottinger/relationship-types.git`
- `composer install`
- `npm install && npm run dev`
- create/configure .env file
	+ `php artisan key:generate`
		* will set `APP_KEY`
- [Database Access](https://laracasts.com/series/laravel-6-from-scratch)
- `php artisan migrate`
- `valet open`
	+ view in browser

# Documentation & Resources

- [DivingLaravel.com](https://divinglaravel.com/)
- [Laravel Explained](https://laracasts.com/series/laravel-explained)
- [Unlocking Badges Workshop](https://laracasts.com/series/unlocking-badges-workshop)
- [What's New in Laravel 6](https://laracasts.com/series/whats-new-in-laravel-6)
- [Mailcoach](https://mailcoach.app)
- [Object-Oriented Principles in PHP](https://laracasts.com/series/object-oriented-principles-in-php)
- [Laravel 6 From Scratch](https://laracasts.com/series/laravel-6-from-scratch)
- [Relationships](https://laravel.com/docs/master/eloquent-relationships)
- [Laravel News Factories](https://laravel-news.com/learn-to-use-model-factories-in-laravel-5-1)
- [Laracasts Polymorphic](https://laracasts.com/lessons/polymorphic-huh)
- [Polymorphic Relationships Youtube](https://www.youtube.com/watch?v=C7T1689IvPQ)
- [Laravel API](https://laravel.com/api/master/index.html)
- [Collision](https://laravel-news.com/using-the-collision-phpunit-listener-with-laravel)
- [larastan](https://github.com/nunomaduro/larastan)
	+ code static analysis
	+ alias phpstan="vendor/bin/phpstan"
	+ `phpstan analyze`
- [Marketing For Developers](https://devmarketing.xyz/) Justin Jackson
- [laracon](https://laracon.net/)
	+ [Schedule](https://laracon.net/#time-table)
- Testing
	+ [Testing Laravel](https://laracasts.com/series/phpunit-testing-in-laravel)
	+ [Building a Laravel App with TDD](https://laracasts.com/series/build-a-laravel-app-with-tdd)
	+ [Confident Laravel](https://confidentlaravel.com/)

# The Packages I have added in this project

- [Collision](https://github.com/nunomaduro/collision#phpunit-adapter)
	+ a package designed 
		* to give you beautiful error reporting 
			- when interacting with your app 
				+ through the command line.
	+ instead of having to **scroll up** the stack trace 
		* after each `phpunit` test
			- this package will show 
				+ the line where the error occurred
- [Laravel Telescope](https://laravel.com/docs/6.x/telescope)
	+ `composer require laravel/telescope --dev`
- [Laravel UI](https://laravel.com/docs/6.x/frontend)
	+ `php artisan ui bootstrap --auth`

```bash

php -v
PHP 7.4.2 (cli) (built: Jan 22 2020 06:30:58) ( NTS )
Copyright (c) The PHP Group
Zend Engine v3.4.0, Copyright (c) Zend Technologies
    with Zend OPcache v7.4.2, Copyright (c), by Zend Technologies





brew search mysql
==> Formulae
automysqlbackup                  mysql-client                     mysql-connector-c++@1.1          mysql@5.6
mysql                            mysql-client@5.7                 mysql-sandbox                    mysql@5.7 ✔
mysql++                          mysql-connector-c++              mysql-search-replace             mysqltuner

==> Casks
mysql-connector-python                      mysql-utilities                             navicat-for-mysql
mysql-shell ✔                               mysqlworkbench                              sqlpro-for-mysql    









composer
   ______
  / ____/___  ____ ___  ____  ____  ________  _____
 / /   / __ \/ __ `__ \/ __ \/ __ \/ ___/ _ \/ ___/
/ /___/ /_/ / / / / / / /_/ / /_/ (__  )  __/ /
\____/\____/_/ /_/ /_/ .___/\____/____/\___/_/
                    /_/
Composer version 1.9.2 2020-01-14 16:30:31






```


