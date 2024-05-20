<?php

namespace App\Sources\Book\Application;

use App\Sources\Book\Domain\BookFinder;
use App\Sources\Book\Domain\Exceptions\BookNotFoundException;
use App\Sources\SharedValueObjects\Uuid;
use App\Sources\Book\Domain\BookRepositoryInterface;

/**
 * Use case for deleting book
 */
class UBookDelete
{
    public function __construct(
        private BookFinder $finder,
        private BookRepositoryInterface $repository,
    )
    {
    }

    /**
     * @throws BookNotFoundException
     */
    public function __invoke(string $uuid): void
    {
        $book = $this->finder->__invoke(new Uuid($uuid));
        $this->repository->delete($book);
    }
}
