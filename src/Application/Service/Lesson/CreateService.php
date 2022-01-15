<?php
declare(strict_types=1);

namespace QuestionsServerSide\Application\Service\Lesson;

use DateTimeImmutable;
use QuestionsServerSide\Domain\Lesson\Lesson;

class CreateService extends LessonService
{
    /**
     * @param Lesson $lesson
     * @return Lesson
     */
    public function __invoke(Lesson $lesson): Lesson
    {
        $lesson->setCreatedAt(createdAt: new DateTimeImmutable());

        return $this->lessonRepository->save(lesson: $lesson);
    }
}