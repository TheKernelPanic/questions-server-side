<?php
declare(strict_types=1);

namespace QuestionsServerSide\Application\Service\Book;

use QuestionsServerSide\Domain\Book\BookRepositoryInterface;

abstract class BookService
{
    /**
     * @param BookRepositoryInterface $bookRepository
     */
    public function __construct(
       protected BookRepositoryInterface $bookRepository
    ) {}
}