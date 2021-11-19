<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\Doctrine\Entity\Question;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use QuestionsServerSide\Domain\Answer\Answer;
use QuestionsServerSide\Domain\Question\Question;

class QuestionDoctrine extends Question
{
    /**
     * @var string
     */
    private string $id;

    /**
     * @var Collection
     */
    private Collection $answers;

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
     * @return Collection|ArrayCollection
     */
    public function getAnswers(): Collection|ArrayCollection
    {
        return $this->answers;
    }
}