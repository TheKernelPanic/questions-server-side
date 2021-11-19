<?php
declare(strict_types=1);

namespace QuestionsServerSide\Application\Service\Topic;

use QuestionsServerSide\Domain\Topic\TopicRepositoryInterface;

abstract class TopicService
{
    /**
     * @param TopicRepositoryInterface $topicRepository
     */
    public function __construct(
        protected TopicRepositoryInterface $topicRepository
    ) {}
}