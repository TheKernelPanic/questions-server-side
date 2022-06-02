<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\Doctrine\Entity\Question;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use QuestionsServerSide\Domain\Question\Question;
use QuestionsServerSide\Domain\Question\QuestionId;
use QuestionsServerSide\Infrastructure\Doctrine\Entity\Answer\AnswerDoctrine;
use QuestionsServerSide\Infrastructure\Doctrine\Entity\Help\HelpDoctrine;
use QuestionsServerSide\Infrastructure\Doctrine\Entity\Lesson\LessonDoctrine;
use QuestionsServerSide\Infrastructure\Doctrine\Entity\Tag\TagDoctrine;
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
     * @var LessonDoctrine|null
     */
    protected ?LessonDoctrine $lesson;

    /**
     * @var Collection
     */
    protected Collection $helps;

    /**
     * @var Collection
     */
    protected Collection $tags;

    /**
     * @param AnswerDoctrine $answer
     * @return void
     */
    public function addAnswer(AnswerDoctrine $answer): void
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
     * @return QuestionId
     */
    public function getId(): QuestionId
    {
        return new QuestionId($this->id);
    }

    /**
     * @return LessonDoctrine|null
     */
    public function getLessonD(): ?LessonDoctrine
    {
        return $this->lesson;
    }

    /**
     * @param LessonDoctrine|null $lesson
     */
    public function setLesson(?LessonDoctrine $lesson): void
    {
        $this->lesson = $lesson;
    }

    /**
     * @return Collection|ArrayCollection
     */
    public function getHelps(): Collection|ArrayCollection
    {
        return $this->helps;
    }

    /**
     * @param HelpDoctrine $help
     * @return void
     */
    public function addHelp(HelpDoctrine $help): void
    {
        if ($this->helps->contains(element: $help)) {
            return;
        }
        $this->helps->add(element: $help);
    }

    /**
     * @return Collection
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    /**
     * @param TagDoctrine $tag
     * @return void
     */
    public function addTag(TagDoctrine $tag): void
    {
        if ($this->tags->contains(element: $tag)) {
            return;
        }
        $this->tags->add(element: $tag);
    }
}