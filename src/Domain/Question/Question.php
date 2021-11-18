<?php
declare(strict_types=1);

namespace QuestionsServerSide\Domain\Question;

use QuestionsServerSide\Domain\Timestampable;

/**
 * Class Question
 * @package QuestionsServerSide\Domain\Question
 */
class Question
{
    use Timestampable;

    /**
     * Question constructor.
     */
    public function __construct(
        protected string $title
    )
    {}

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}