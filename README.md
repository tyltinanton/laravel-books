## Test API application for the library service

## Author

   ### Anton Tyltin
   ### https://djinni.co/q/50c6ce9b89/
    

## Tech stack

* Framework - Laravel 11
* PHP 8.3
* PostgresSQL 16.2
* Hexagonal Architecture


## Book model:
* Title (string)
* Publisher (string)
* Author (string)
* Genre (string)
* Book publication (date)
* Amount of words in the book (int)
* Book price in US Dollars


## Available operations

* ``GET /api/books`` - Get the book list
* ``PUT /api/books`` - Create a new book
* ``POST /api/books`` - Update the book
* ``PATCH /api/books`` - Publish the book
* ``DELETE /api/books`` - Delete the book

## LOCAL VERSION

```shell
cd devops 
docker-compose up
```

Open another terminal and execute:

```shell
docker exec -it books_api /bin/bash
chmod -R 775 ./storage
chmod -R 775 ./bootstrap/cache
composer install
php artisan migrate
php artisan test
php artisan l5-swagger:generate
```

After this open http://localhost:8000/docs

## Time spent
https://wakatime.com/@Quasar/projects/axklxsdolz?start=2024-05-17&end=2024-05-20

## License

It's a test application for the public audience
