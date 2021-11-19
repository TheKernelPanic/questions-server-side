<?php
declare(strict_types=1);

namespace QuestionsServerSide\Domain\Lesson;

use QuestionsServerSide\Domain\Book\Book;

class Lesson
{
    /**
     * @param Book $book
     * @param string $description
     * @param int $position
     */
    public function __construct(
        protected Book $book,
        protected string $description,
        protected int $position
    ){}

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @return Book
     */
    public function getBook(): Book
    {
        return $this->book;
    }
}