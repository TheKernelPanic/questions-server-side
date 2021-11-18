<?php
declare(strict_types=1);

namespace QuestionsServerSide\Domain\Topic;

use QuestionsServerSide\Domain\RepositoryInterface;

interface TopicRepositoryInterface extends RepositoryInterface
{
    /**
     * @return array
     */
    public function findAll(): array;
}