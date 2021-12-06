<?php
declare(strict_types=1);

namespace QuestionsServerSide\Application\Service\Book;

use QuestionsServerSide\Domain\Book\Book;
use QuestionsServerSide\Domain\Book\BookId;
use QuestionsServerSide\Domain\Book\BookRecordNotFoundException;
use function is_null;

final class FinderService extends BookService
{
    /**
     * @param BookId $bookId
     * @return Book
     * @throws BookRecordNotFoundException
     */
    public function __invoke(BookId $bookId): Book
    {
        $book = $this->bookRepository->findOneByCriteria(criteria: array(
            'id' => $bookId->id()
        ));
        if (is_null($book)) {
            throw new BookRecordNotFoundException;
        }
        return $book;
    }
}