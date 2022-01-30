<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\Doctrine\Entity\Answer;

use QuestionsServerSide\Domain\Answer\Answer;
use QuestionsServerSide\Domain\Answer\AnswerId;

class AnswerDoctrine extends Answer
{
    /**
     * @var string
     */
    private string $id;

    /**
     * @return AnswerId
     */
    public function getId(): AnswerId
    {
        return new AnswerId(id: $this->id);
    }
}