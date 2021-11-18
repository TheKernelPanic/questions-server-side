<?php
declare(strict_types=1);

namespace QuestionsServerSide\Domain\Topic;

class Topic
{
    /**
     * @param string $description
     */
    public function __construct(
        protected string $description
    )
    {}

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}