<?php
declare(strict_types=1);

namespace QuestionsServerSide\Domain\Book;

use QuestionsServerSide\Domain\Timestampable;

class Book
{
    use Timestampable;

    /**
     * @param string $title
     * @param string|null $author
     */
    public function __construct(
       protected string $title,
       protected ?string $author
    ) {}

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }
}