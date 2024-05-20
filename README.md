## Test application for the book library service

## Author

   ### Tyltin Anton
   ### https://djinni.co/q/50c6ce9b89/
    

## Tech stack

* Framework - Laravel 
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


## Available opertaions

* ``GET /api/books`` - Get list of the books
* ``PUT /api/books`` - Create a new book
* ``POST /api/books`` - Update the book
* ``PATCH /api/books`` - Publish book
* ``DELETE /api/books`` - Delete a book

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

## License

It's test application for the public audience
