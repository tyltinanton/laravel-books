<?php

namespace App\Sources\Book\Application;

use App\Sources\SharedValueObjects\Author;
use App\Sources\SharedValueObjects\CreatedAt;
use App\Sources\SharedValueObjects\Genre;
use App\Sources\SharedValueObjects\Name;
use App\Sources\SharedValueObjects\Publisher;
use App\Sources\SharedValueObjects\Quantity;
use App\Sources\SharedValueObjects\Summary;
use App\Sources\SharedValueObjects\Uuid;
use App\Sources\Book\Domain\Book;
use App\Sources\Book\Domain\BookRepositoryInterface;

/**
 * Use case for inserting / updating book
 */
class UBookUpSert
{
    public function __construct(
        protected BookRepositoryInterface $repository
    )
    {
    }

    public function __invoke(
        ?string $uuid,
        string $title,
        string $publisher,
        string $author,
        string $genre,
        string $amount,
        string $price,
        ?string $publication = null,
    ): ?Book
    {
        $book = new Book(
            $uuid ? new Uuid($uuid) : Uuid::random(),
            new Name($title),
            new Publisher($publisher),
            new Author($author),
            new Genre($genre),
            new Quantity($amount),
            new Summary($price),
            null,
        );

        if ($publication)
            $book->setPublication(CreatedAt::fromPrimitive($publication));

        return $this->repository->save($book);
    }
}
