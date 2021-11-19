<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\Doctrine\Repository\Lesson;

use QuestionsServerSide\Domain\Lesson\Lesson;
use QuestionsServerSide\Domain\Lesson\LessonRepositoryInterface;
use QuestionsServerSide\Infrastructure\Doctrine\Repository\DoctrineRepository;

class LessonDoctrineRepository extends DoctrineRepository implements LessonRepositoryInterface
{
    /**
     * @param array $criteria
     * @return object|null
     */
    public function findOneByCriteria(array $criteria): ?object
    {
        // TODO: Implement findOneByCriteria() method.
        return null;
    }

    /**
     * @param Lesson $lesson
     * @return Lesson
     */
    public function save(Lesson $lesson): Lesson
    {
        $this->manager->persist($lesson);
        $this->manager->flush();
        return $lesson;
    }
}