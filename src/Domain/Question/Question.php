<?php
declare(strict_types=1);

namespace QuestionsServerSide\Domain\Question;

use QuestionsServerSide\Domain\Timestampable;
use QuestionsServerSide\Domain\Topic\Topic;

/**
 * Class Question
 * @package QuestionsServerSide\Domain\Question
 */
class Question
{
    use Timestampable;

    /**
     * @var Topic|null
     */
    protected ?Topic $topic;

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
     * @return Topic|null
     */
    public function getTopic(): ?Topic
    {
        return $this->topic;
    }

    /**
     * @param Topic|null $topic
     */
    public function setTopic(?Topic $topic): void
    {
        $this->topic = $topic;
    }
}