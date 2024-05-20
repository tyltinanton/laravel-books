<?php

namespace App\Sources\Book\Infrastructure;

use App\Models\AppBook;
use App\Sources\Book\Domain\Book;
use App\Sources\Book\Domain\BookCollection;
use App\Sources\Book\Domain\BookRepositoryInterface;
use App\Sources\SharedValueObjects\Uuid;
use Illuminate\Support\Facades\Log;

/**
 * Book repository for performing operations with DB PostgresSQL.
 * If we use another DB we can create other repository and connect it in the app/Providers/AppServiceProvider.php
 */
class PgSqlBookRepository implements BookRepositoryInterface
{

    public function save(Book $saveItem): ?Book
    {
        $operation = 'added';
        if ($exists = AppBook::query()->find($saveItem->uuid()->value())) {
            $exists->fill($saveItem->toPrimitives())->save();
            $operation = 'updated';
        } else {
            $entity = new AppBook($saveItem->toPrimitives());
            $entity->save();
        }

        Log::info("AppService. Book has been {$operation} successfully", [
            'uuid' => $saveItem->uuid()->value(),
        ]);

        return $this->find($saveItem->uuid());
    }

    public function find(Uuid $uuid): Book|null
    {
        $entity = AppBook::query()->find($uuid->value());
        if (!$entity)
            return null;
        return Book::fromPrimitives($entity);
    }

    public function search(string $search = ''): BookCollection
    {
        $items = AppBook::query();

        if ($search != '')
            $items = $items->where('title', 'like', '%' . $search . '%');

        $items = $items->get();

        $result = new BookCollection();
        foreach ($items as $item)
            $result->add(Book::fromPrimitives($item));

        return $result;
    }

    public function delete(Book $book): void
    {
        $entity = AppBook::query()->find($book->uuid()->value());
        $entity?->delete();
    }
}
