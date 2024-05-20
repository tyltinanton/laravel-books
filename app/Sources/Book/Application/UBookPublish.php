<?php

namespace App\Sources\Book\Application;

use App\Sources\Book\Domain\Book;
use App\Sources\Book\Domain\BookFinder;
use App\Sources\Book\Domain\BookRepositoryInterface;
use App\Sources\Book\Domain\Exceptions\BookNotFoundException;
use App\Sources\SharedValueObjects\CreatedAt;
use App\Sources\SharedValueObjects\Publisher;
use App\Sources\SharedValueObjects\Uuid;
use Illuminate\Support\Facades\Log;

/**
 * Use case for publishing the book
 */
class UBookPublish
{
    public function __construct(
        private BookRepositoryInterface $repository,
        private BookFinder $finder,
    )
    {
    }

    /**
     * @throws BookNotFoundException
     */
    public function __invoke(string $uuid, string $publisher): ?Book
    {
        $book = $this->finder->__invoke(new Uuid($uuid));

        if (!$book->publication()) {
            $book->setPublication(new CreatedAt(new \DateTime()));
            $book->setPublisher(new Publisher($publisher));
            $book = $this->repository->save($book);
            Log::info('Book has been published',[
                'uuid' => $uuid,
            ]);
            return $book;
        }
        Log::info('Book has not been published, because has a status Published already',[
            'uuid' => $uuid,
        ]);
        return null;
    }
}
