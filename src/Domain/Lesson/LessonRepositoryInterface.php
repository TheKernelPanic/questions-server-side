<?php
declare(strict_types=1);

namespace QuestionsServerSide\Domain\Lesson;

use QuestionsServerSide\Domain\RepositoryInterface;

interface LessonRepositoryInterface extends RepositoryInterface
{
    /**
     * @param Lesson $lesson
     * @return Lesson
     */
    public function save(Lesson $lesson): Lesson;

    /**
     * @param array $criteria
     * @return array
     */
    public function findManyByCriteria(array $criteria): array;

    /**
     * @return array
     */
    public function findAll(): array;
}