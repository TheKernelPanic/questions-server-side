<?php
declare(strict_types=1);

namespace QuestionsDDD\Domain\Answer;

use JetBrains\PhpStorm\Pure;
use QuestionsDDD\Domain\Question\Question;
use QuestionsDDD\Domain\Timestampable;

/**
 * Class Answer
 * @package QuestionsDDD\Domain\Answer
 */
class Answer
{
    use Timestampable;

    /**
     * @var string
     */
    private string $id;

    /**
     * @param string $text
     * @param Question $question
     * @param bool $result
     * @param int $position
     */
    #[Pure] public function __construct(
        private string $text,
        private Question $question,
        private bool $result,
        private int $position
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