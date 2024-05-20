<?php

namespace App\Sources\Book\Domain;

use App\Sources\SharedValueObjects\Author;
use App\Sources\SharedValueObjects\CreatedAt;
use App\Sources\SharedValueObjects\Genre;
use App\Sources\SharedValueObjects\Name;
use App\Sources\SharedValueObjects\Publisher;
use App\Sources\SharedValueObjects\Quantity;
use App\Sources\SharedValueObjects\Summary;
use App\Sources\SharedValueObjects\UpdatedAt;
use App\Sources\SharedValueObjects\Uuid;

/**
 * Main class of the Book (Domain)
 */
class Book
{
    public function __construct(
        private Uuid       $uuid,
        private Name $title,
        private Publisher $publisher,
        private Author $author,
        private Genre $genre,
        private Quantity $amount,
        private Summary $price,
        private ?CreatedAt $publication = null,
        private ?CreatedAt $createdAt = null,
        private ?UpdatedAt $updatedAt = null
    )
    {
    }

    public function title(): Name
    {
        return $this->title;
    }

    public function setTitle(Name $title): void
    {
        $this->title = $title;
    }

    public function publisher(): Publisher
    {
        return $this->publisher;
    }

    public function setPublisher(Publisher $publisher): void
    {
        $this->publisher = $publisher;
    }

    public function author(): Author
    {
        return $this->author;
    }

    public function setAuthor(Author $author): void
    {
        $this->author = $author;
    }

    public function genre(): Genre
    {
        return $this->genre;
    }

    public function setGenre(Genre $genre): void
    {
        $this->genre = $genre;
    }

    public function amount(): Quantity
    {
        return $this->amount;
    }

    public function setAmount(Quantity $amount): void
    {
        $this->amount = $amount;
    }

    public function price(): Summary
    {
        return $this->price;
    }

    public function setPrice(Summary $price): void
    {
        $this->price = $price;
    }

    public function publication(): ?CreatedAt
    {
        return $this->publication;
    }

    public function setPublication(?CreatedAt $publication): void
    {
        $this->publication = $publication;
    }

    /*
     * @return Uuid
     */
    public function uuid(): Uuid
    {
        return $this->uuid;
    }

    /*
     * @param Uuid $uuid
     */
    public function setUuid(Uuid $uuid): void
    {
        $this->uuid = $uuid;
    }

    /*
     * @return CreatedAt|null
     */
    public function createdAt(): ?CreatedAt
    {
        return $this->createdAt;
    }

    /*
     * @param CreatedAt|null $createdAt
     */
    public function setCreatedAt(?CreatedAt $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /*
     * @return UpdatedAt|null
     */
    public function updatedAt(): ?UpdatedAt
    {
        return $this->updatedAt;
    }

    /*
     * @param UpdatedAt|null $updatedAt
     */
    public function setUpdatedAt(?UpdatedAt $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }


    public function toPrimitives(): array
    {
        return [
            'uuid' => $this->uuid()->value(),
            'title' => $this->title()->value(),
            'publisher' => $this->publisher()->value(),
            'author' => $this->author()->value(),
            'genre' => $this->genre()->value(),
            'amount' => $this->amount()->value(),
            'price' => $this->price()->value(),
            'publication' => $this->publication()?->value()->format('Y-m-d H:i:s'),
            'publicationFormat' => $this->publication()?->value()->format('m/d/Y H:i:s'),
            'createDate' => $this->createdAt()?->value()->format('m/d/Y H:i:s'),
        ];
    }

    static public function fromPrimitives($data): Book
    {
        return new self(
            new Uuid($data->uuid),
            new Name($data->title),
            new Publisher($data->publisher),
            new Author($data->author),
            new Genre($data->genre),
            new Quantity($data->amount),
            new Summary($data->price),
            $data->publication ? CreatedAt::fromPrimitive($data->publication) : null,
            CreatedAt::fromPrimitive($data->created_at),
            UpdatedAt::fromPrimitive($data->updated_at)
        );
    }

}
