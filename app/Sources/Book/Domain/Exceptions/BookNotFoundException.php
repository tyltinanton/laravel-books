<?php

namespace App\Sources\Book\Domain\Exceptions;

use App\Sources\SharedValueObjects\Uuid;

/**
 * Custom error handler if the book is not found
 */
class BookNotFoundException extends \Exception
{
    public function __construct(Uuid $id)
    {
        parent::__construct(sprintf("Book with id <%s> does not exists", $id->value()));
    }
}
