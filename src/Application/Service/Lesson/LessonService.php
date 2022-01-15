<?php
declare(strict_types=1);

namespace QuestionsServerSide\Application\Service\Lesson;

use QuestionsServerSide\Domain\Lesson\LessonRepositoryInterface;

abstract class LessonService
{
    /**
     * @param LessonRepositoryInterface $lessonRepository
     */
    public function __construct(
        protected LessonRepositoryInterface $lessonRepository
    ) {}
}