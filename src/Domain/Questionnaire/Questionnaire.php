<?php
declare(strict_types=1);

namespace QuestionsServerSide\Domain\Questionnaire;

use QuestionsServerSide\Domain\Timestampable;

class Questionnaire
{
    use Timestampable;

    public function __construct(
        protected string $title
    ) {}

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}