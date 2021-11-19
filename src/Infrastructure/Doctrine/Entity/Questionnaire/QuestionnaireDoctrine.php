<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\Doctrine\Entity\Questionnaire;

use Doctrine\Common\Collections\ArrayCollection;
use QuestionsServerSide\Infrastructure\Doctrine\Entity\Question\QuestionDoctrine;

class QuestionnaireDoctrine
{
    /**
     * @var string
     */
    private string $id;

    /**
     * @var ArrayCollection
     */
    private ArrayCollection $questions;

    /**
     * @param QuestionDoctrine $question
     */
    public function addQuestion(QuestionDoctrine $question): void
    {
        $this->questions->add(element: $question);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return ArrayCollection
     */
    public function getQuestions(): ArrayCollection
    {
        return $this->questions;
    }
}