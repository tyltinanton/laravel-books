<?php

namespace App\Sources\Book\Domain;

use App\Sources\SharedValueObjects\Uuid;
use Illuminate\Support\Collection;

/**
 * Interface for the book repository
 */
interface BookRepositoryInterface
{
    public function save(Book $saveItem): ?Book;

    public function find(Uuid $uuid): Book|null;

    public function search(string $search = ''): BookCollection;
    public function delete(Book $book): void;
}
