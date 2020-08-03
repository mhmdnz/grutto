# Grutto

The Application is wrriten on Laravel, if you are not familier with the environment please check the link below:

[Laravel Installation](https://laravel.com/docs/7.x/installation)

# Installation Guid

## Manualy
  - [Clone project from Git repository](https://github.com/mhmdnz/grutto.git)
  - [Edit ENV file](#Edit-env-File)
  - [Install Composer Packages](#Install-Composer-Packages)
  - [Run DB migrations](#Run-DB-migrations)
  - [Add laravel schedules to your cronjobs](#Add-laravel-schedules-to-your-cronjobs)
  - [Run Tests](#Run-Tests)
  - [Check Swagger.yml](#Check-Swagger.yml)
  
## Docker
- [Docker](#Docker-Installation-Guid)

### Clone project From Git

```sh
$ mkdir grutto
$ cd grutto
$ git clone "https://github.com/mhmdnz/grutto.git" .
```

### Edit env File

To run laravel applications you have to define your system configuration for the laravel in .env file

```sh
$ mv .env.example .env
$ vim .env
```

### Install Composer Packages

```sh
$ composer install
```

### Run DB migrations

> Do not forget to create your database and give it to the .env file or you will get and Error<br>
> - If you got any error you could simply use <strong>fresh</strong> parameter<br>
> - Or if you are not familier with laravel migrations just drop and create your database again
```sh
//Create database example
//login to mysql console then use below command
$ mysql -u{enter user name here} -p{enter password here}
$ Create Database grutto
```
```sh
$ php artisan migrate --seed
```

### Run Tests

```sh
//you could run all the tests by running below command in the project root
$ phpunit
//or 
$ ./vendor/bin/phpunit
```

```sh
//you could run only one test by using this command
$ phpunit /address of the test
```

### Check Swagger.ym

> API's documentation, swagger file is also available on the root of the project<br>
> notice that , its just a simple swagger and not so accurate, and it takes more time to make it more usable


# Docker Installation Guid

  - [Clone project from Git repository](https://github.com/mhmdnz/grutto.git)
  - [Run Prepration File](#Run-Prepration-File)
  
```sh
//it will bring project up
$ docker-compose up --build -d
$ docker exec -it php sh /tmp/Prepration.sh
```
> Check the result : localhost:8080
## Some notices about php tasks
> Please notice that, <br>
> - task 4 : you could check this task on news page , for example this url will work <br>
> http://www.google.com/asd/article/qwe but these two will not ,http://www.google.com/nl/article/qwe and 
> http://www.google.com/asd/article/12
> - task 5 and 7: news and home pages are written on pure javascript ( none jquery ) as you asked and all the tables
> and ul are filling by js
> - task 6 : there is a middleware that you could add to any routes that you wanted, the middleware name is "addXCacheHeader"
> - task 7 : I have used cache for this task and you could checking your cache driver for them  

## Some notices about mysql tasks
> Please notice that, <br>
> - mysql task is located in sql_queries.sql file in the project directory