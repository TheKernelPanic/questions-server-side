<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\Doctrine\Entity\Lesson;

use QuestionsServerSide\Domain\Lesson\Lesson;

class LessonDoctrine extends Lesson
{
    /**
     * @var string
     */
    private string $id;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}