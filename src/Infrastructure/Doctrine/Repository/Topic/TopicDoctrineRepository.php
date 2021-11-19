<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\Doctrine\Repository\Topic;

use QuestionsServerSide\Domain\Topic\TopicRepositoryInterface;
use QuestionsServerSide\Infrastructure\Doctrine\Entity\Topic\TopicDoctrine;
use QuestionsServerSide\Infrastructure\Doctrine\Repository\DoctrineRepository;

class TopicDoctrineRepository extends DoctrineRepository implements TopicRepositoryInterface
{
    /**
     * @param array $criteria
     * @return object|null
     */
    public function findOneByCriteria(array $criteria): ?object
    {
        return $this->manager->getRepository(TopicDoctrine::class)->findOneBy(criteria: $criteria);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->manager->getRepository(TopicDoctrine::class)->findAll();
    }
}