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
}