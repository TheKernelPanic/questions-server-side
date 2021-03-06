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

    /**
     * @return array
     */
    public function findAll(): array;

    /**
     * @param array $criteria
     * @return array
     */
    public function findManyByCriteria(array $criteria): array;
}