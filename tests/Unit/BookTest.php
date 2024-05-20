<?php

namespace Tests\Unit;

use App\Models\AppBook;
use App\Sources\Book\Domain\Book;
use Tests\TestCase;

class BookTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $books = AppBook::factory(10)->create();
        $books->map(function ($_book) {
           $book = Book::fromPrimitives($_book);
           $this->assertTrue($book->uuid()->value() !== '');

           $_book->save();
        });

        $bookCount = AppBook::all()->count();
        $this->assertEquals(10, $bookCount);

        $books->map(function ($_book) {
            $_book->delete();
        });

        $bookCount = AppBook::all()->count();
        $this->assertEquals(0, $bookCount);
    }
}
