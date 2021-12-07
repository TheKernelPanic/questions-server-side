<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\Doctrine\Entity\Lesson;

use QuestionsServerSide\Domain\Lesson\Lesson;
use QuestionsServerSide\Infrastructure\Doctrine\Entity\Book\BookDoctrine;

class LessonDoctrine extends Lesson
{
    /**
     * @var string
     */
    private string $id;

    /**
     * @var BookDoctrine
     */
    private BookDoctrine $book;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param BookDoctrine $book
     */
    public function setBook(BookDoctrine $book): void
    {
        $this->book = $book;
    }

    /**
     * @return BookDoctrine
     */
    public function getBook(): BookDoctrine
    {
        return $this->book;
    }
}