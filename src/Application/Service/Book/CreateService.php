<?php
declare(strict_types=1);

namespace QuestionsServerSide\Application\Service\Book;

use DateTimeImmutable;
use QuestionsServerSide\Domain\Book\Book;

final class CreateService extends BookService
{
    /**
     * @param Book $book
     */
    public function __invoke(Book $book): void
    {
        $book->setCreatedAt(createdAt: new DateTimeImmutable());
        $this->bookRepository->save(book: $book);
    }
}