<?php
declare(strict_types=1);

namespace QuestionsServerSide\Domain\Lesson;

use QuestionsServerSide\Domain\Timestampable;

class Lesson
{
    use Timestampable;

    /**
     * @param string $description
     * @param int $position
     */
    public function __construct(
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
}