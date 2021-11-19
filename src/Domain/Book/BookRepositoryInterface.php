<?php
declare(strict_types=1);

namespace QuestionsServerSide\Domain\Book;

use QuestionsServerSide\Domain\RepositoryInterface;

interface BookRepositoryInterface extends RepositoryInterface
{
    /**
     * @param Book $book
     * @return Book
     */
    public function save(Book $book): Book;
}