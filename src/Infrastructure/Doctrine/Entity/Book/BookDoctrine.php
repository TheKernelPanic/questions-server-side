<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\Doctrine\Entity\Book;

use QuestionsServerSide\Domain\Book\Book;

class BookDoctrine extends Book
{
    /**
     * @var string
     */
    private string $id;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}