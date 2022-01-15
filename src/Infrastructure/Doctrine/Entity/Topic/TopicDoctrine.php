<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\Doctrine\Entity\Topic;

use QuestionsServerSide\Domain\Topic\Topic;
use QuestionsServerSide\Domain\Topic\TopicId;

class TopicDoctrine extends Topic
{
    /**
     * @var string
     */
    private string $id;

    /**
     * @return TopicId
     */
    public function getId(): TopicId
    {
        return new TopicId(id: $this->id);
    }
}