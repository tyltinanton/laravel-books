<?php

namespace App\Sources\Book\Domain;

use App\Sources\Book\Domain\Exceptions\BookNotFoundException;
use App\Sources\SharedValueObjects\Uuid;

/**
 * Book searcher. If not exists we can receive an error
 */
class BookFinder
{
    public function __construct(
        protected BookRepositoryInterface $repository
    )
    {
    }

    /**
     * @throws BookNotFoundException
     */
    public function __invoke(Uuid $uuid): Book
    {
        $item = $this->repository->find($uuid);
        if ($item === null) {
            throw new BookNotFoundException($uuid);
        }

        return $item;
    }
}
