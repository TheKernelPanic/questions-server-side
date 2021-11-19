<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\Doctrine\Repository\Book;

use QuestionsServerSide\Domain\Book\Book;
use QuestionsServerSide\Domain\Book\BookRepositoryInterface;
use QuestionsServerSide\Infrastructure\Doctrine\Entity\Book\BookDoctrine;
use QuestionsServerSide\Infrastructure\Doctrine\Repository\DoctrineRepository;

class BookDoctrineRepository extends DoctrineRepository implements BookRepositoryInterface
{
    /**
     * @param array $criteria
     * @return object|null
     */
    public function findOneByCriteria(array $criteria): ?object
    {
        // TODO: Implement findOneByCriteria() method.
        return null;
    }

    public function save(Book $book): Book
    {
        $this->manager->persist($book);
        $this->manager->flush();
        return $book;
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->manager->getRepository(BookDoctrine::class)->findAll();
    }
}