<?php
declare(strict_types=1);

namespace QuestionsDDD\Domain\Question;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JetBrains\PhpStorm\Pure;
use QuestionsDDD\Domain\Answer\Answer;
use QuestionsDDD\Domain\Timestampable;

/**
 * Class Question
 * @package QuestionsDDD\Domain\Question
 */
class Question
{
    use Timestampable;

    /**
     * @var string
     */
    private string $id;

    /**
     * @var Collection
     */
    private Collection $answers;

    /**
     * Question constructor.
     */
    #[Pure] public function __construct(
        private string $title
    )
    {
        $this->answers = new ArrayCollection();
    }

    /**
     * @param Answer $answer
     */
    public function addAnswer(Answer $answer): void
    {
        if ($this->answers->contains(element: $answer)) {
            return;
        }
        $this->answers->add(element: $answer);
    }

    /**
     * @return Collection
     */
    public function getAnswers(): Collection
    {
        return $this->answers;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}