<?php
declare(strict_types=1);

namespace QuestionsServerSide\Application\Service\Question;

use DateTimeImmutable;
use QuestionsServerSide\Infrastructure\Doctrine\Entity\Question\QuestionDoctrine;

final class CreateService extends QuestionService
{
    /**
     * @param QuestionDoctrine $question
     */
    public function __invoke(QuestionDoctrine $question): void
    {
        $question->setCreatedAt(createdAt: new DateTimeImmutable());
        foreach ($question->getAnswers() as $answer) {
            $answer->setQuestion(question: $question);
            $answer->setCreatedAt(createdAt: new DateTimeImmutable());
        }
        $this->questionRepository->save(question: $question);
    }
}