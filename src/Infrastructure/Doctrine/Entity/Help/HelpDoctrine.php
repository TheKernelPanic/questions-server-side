<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\Doctrine\Entity\Help;

use QuestionsServerSide\Domain\Book\Book;
use QuestionsServerSide\Domain\Help\Help;
use QuestionsServerSide\Domain\Help\HelpId;
use QuestionsServerSide\Domain\Lesson\Lesson;
use QuestionsServerSide\Domain\Topic\Topic;

class HelpDoctrine extends Help
{
    /**
     * @var string
     */
    private string $id;

    /**
     * @var Topic|null
     */
    private ?Topic $topic;

    /**
     * @var Book|null
     */
    private ?Book $book;

    /**
     * @var Lesson|null
     */
    private ?Lesson $lesson;

    /**
     * @return HelpId
     */
    public function getId(): HelpId
    {
        return new HelpId(id: $this->id);
    }

    /**
     * @return Topic|null
     */
    public function getTopic(): ?Topic
    {
        return $this->topic;
    }

    /**
     * @return Lesson|null
     */
    public function getLesson(): ?Lesson
    {
        return $this->lesson;
    }

    /**
     * @return Book|null
     */
    public function getBook(): ?Book
    {
        return $this->book;
    }

    /**
     * @param Book|null $book
     */
    public function setBook(?Book $book): void
    {
        $this->book = $book;
    }
}