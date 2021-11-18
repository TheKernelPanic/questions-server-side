<?php
declare(strict_types=1);

namespace QuestionsServerSide\Domain\Answer;

use JetBrains\PhpStorm\Pure;
use QuestionsServerSide\Domain\Question\Question;
use QuestionsServerSide\Domain\Timestampable;

/**
 * Class Answer
 * @package QuestionsServerSide\Domain\Answer
 */
class Answer
{
    use Timestampable;

    /**
     * @param string $text
     * @param Question $question
     * @param bool $result
     * @param int $position
     */
    #[Pure] public function __construct(
        protected string $text,
        protected Question $question,
        protected bool $result,
        protected int $position
    )
    {}

    /**
     * @return bool
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
}