<?php
declare(strict_types=1);

namespace QuestionsDDD\Domain\Question;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JetBrains\PhpStorm\Pure;
use QuestionsDDD\Domain\Answer\Answer;
use QuestionsDDD\Domain\Timestampable;
use QuestionsDDD\Domain\Translation\Translatable;
use QuestionsDDD\Domain\Translation\Translation;

/**
 * Class Question
 * @package QuestionsDDD\Domain\Question
 */
class Question implements Translatable
{
    use Timestampable;

    /**
     * @var string
     */
    private string $id;

    /**
     * @var Collection
     */
    private Collection $translations;

    /**
     * @var Collection
     */
    private Collection $answers;

    /**
     * Question constructor.
     */
    #[Pure] public function __construct()
    {
        $this->translations = new ArrayCollection();
        $this->answers = new ArrayCollection();
    }

    /**
     * @param Translation $translation
     */
    public function addTranslation(Translation $translation): void
    {
        if ($this->translations->contains(element: $translation)) {
            return;
        }
        $this->translations->add(element: $translation);
    }

    /**
     * @return Collection
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
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
}