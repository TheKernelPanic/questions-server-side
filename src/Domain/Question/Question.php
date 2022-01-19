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
     * @var string|null
     */
    protected ?string $observations;

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

    /**
     * @return string|null
     */
    public function getObservations(): ?string
    {
        return $this->observations;
    }

    /**
     * @param string|null $observations
     */
    public function setObservations(?string $observations): void
    {
        $this->observations = $observations;
    }
}