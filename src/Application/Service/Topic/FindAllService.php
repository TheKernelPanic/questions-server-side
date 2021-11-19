<?php
declare(strict_types=1);

namespace QuestionsServerSide\Application\Service\Topic;

final class FindAllService extends TopicService
{
    /**
     * @return array
     */
    public function __invoke(): array
    {
        return $this->topicRepository->findAll();
    }
}