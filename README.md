# opinions-assemble
> A server app that allows registering attendees to an assembly and facilitates voting for motions presented.

A server app that allows registering attendees to an assembly and facilitates voting for motions presented.

## Installation

### Requisites

* PHP 5.6.4 or higher
* PHP Extensions:
	* OpenSSL
	* PDO
	* Mbstring
	* Tokenizer
	* XML
* Composer 1.4 or later (be sure to follow the [https://getcomposer.org/doc/00-intro.md](instructions to install)
* A MySQL or MariaDB database server running. (It could work on PostgreSQL, but it hasn't been tested.)

OS X & Linux:

1. Download the latest release [https://github.com/andresrs/opinions-assemble/releases](here).
1. Unzip the package.
1. Upload the contents of the folder to your server.
1. Run the following commands on the server:

		```
			composer install
			php artisan migrate
		```

1. Configure a cron job to run the following command `php artisan /path/to/your/project/artisan schedule:run >> /dev/null 2>&1`.
1. Access it through the HTTP server address. For example, http://yourserver.tld/ or http://127.0.0.1
1. Head to http://yourserver.tld/install and follow the instructions.
1. Create and upload a CSV file containing the following columns:
	1. Name
	2. ID that will be used to identify the attendees
	3. E-mail that the attendees may receive messages

## Development setup

*Under construction*

## Release History

* 1.0
    * Upload attendee list
	* Register attendees that arrive at the assembly
	* Attendees sign in to vote on motions presented
	* Present motions to be voted on
		* Attendees will have 20 minutes to submit their votes
	* Show results for all the motions voted

## Resources

* [How to write a great README for your GitHub project](https://dbader.org/blog/write-a-great-readme-for-your-github-project) by Dan Bader
* [HTML5Boilerplate](https://html5boilerplate.com/) and [http://www.initializr.com/](Initializr).
	* Updated to [jQuery 3.2.1](https://jquery.com/) and [Bootstrap 3.3.7](http://getbootstrap.com/).
* [Laravel 5.4 from scratch](https://laracasts.com/series/laravel-from-scratch-2017/)

## Meta

Andres Rosado - andres.rosado@gmail.com

Distributed under the BSD 3-clause license. See ``LICENSE`` for more information.

[https://github.com/andresrs/opinions-assemble](https://github.com/andresrs/opinions-assemble)
