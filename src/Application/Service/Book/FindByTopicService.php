<?php
declare(strict_types=1);

namespace QuestionsServerSide\Application\Service\Book;

use QuestionsServerSide\Domain\Topic\Topic;

final class FindByTopicService extends BookService
{
    /**
     * @param Topic $topic
     * @return array
     */
    public function __invoke(Topic $topic): array
    {
        return $this->bookRepository->findManyByCriteria(array(
            'topic' => $topic
        ));
    }
}