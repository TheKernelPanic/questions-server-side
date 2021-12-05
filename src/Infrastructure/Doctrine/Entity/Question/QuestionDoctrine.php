<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\Doctrine\Entity\Question;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use QuestionsServerSide\Domain\Answer\Answer;
use QuestionsServerSide\Domain\Question\Question;
use QuestionsServerSide\Infrastructure\Doctrine\Entity\Topic\TopicDoctrine;

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
     * @var TopicDoctrine|null
     */
    protected ?TopicDoctrine $topic;

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

    /**
     * @return TopicDoctrine|null
     */
    public function getTopic(): ?TopicDoctrine
    {
        return $this->topic;
    }

    /**
     * @param TopicDoctrine|null $topic
     */
    public function setTopic(?TopicDoctrine $topic): void
    {
        $this->topic = $topic;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}