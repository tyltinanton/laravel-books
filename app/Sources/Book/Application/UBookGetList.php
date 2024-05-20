<?php

namespace App\Sources\Book\Application;

use App\Sources\Book\Domain\BookCollection;
use App\Sources\Book\Domain\BookRepositoryInterface;

/**
 * Use case for receiving a list of books
 */
class UBookGetList
{
    public function __construct(
        private BookRepositoryInterface $repository
    )
    {
    }

    public function __invoke(string $search = ''): BookCollection
    {
        return $this->repository->search($search);
    }
}
