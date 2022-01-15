<?php
declare(strict_types=1);

namespace QuestionsServerSide\Application\Service\Lesson;

class FindAllService extends LessonService
{
    /**
     * @return array
     */
    public function __invoke(): array
    {
        return $this->lessonRepository->findAll();
    }
}