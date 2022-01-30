<?php
declare(strict_types=1);

namespace QuestionsServerSide\Application\Service\Help;

use QuestionsServerSide\Domain\Topic\Topic;

final class FindAllByTopicService extends HelpService
{
    /**
     * @param Topic $topic
     * @return array
     */
    public function __invoke(Topic $topic): array
    {
        return $this->helpRepository->findByCriteria(
            criteria: array(
                'topic' => $topic
            )
        );
    }
}