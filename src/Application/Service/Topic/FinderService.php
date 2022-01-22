<?php
declare(strict_types=1);

namespace QuestionsServerSide\Application\Service\Topic;

use QuestionsServerSide\Domain\Topic\Topic;
use QuestionsServerSide\Domain\Topic\TopicId;
use QuestionsServerSide\Domain\Topic\TopicNotFoundException;
use function is_null;

final class FinderService extends TopicService
{
    /**
     * @param TopicId $topicId
     * @return Topic
     * @throws TopicNotFoundException
     */
    public function __invoke(TopicId $topicId): Topic
    {
        $topic = $this->topicRepository->findOneByCriteria(criteria: array(
            'id' => $topicId->id()
        ));
        if (is_null($topic)) {
            throw new TopicNotFoundException;
        }
        return $topic;
    }
}