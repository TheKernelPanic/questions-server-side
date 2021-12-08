<?php

namespace QuestionsServerSide\Application\Service\Question;

use QuestionsServerSide\Domain\Question\Question;
use QuestionsServerSide\Domain\Question\QuestionId;
use QuestionsServerSide\Domain\Question\QuestionNotFoundException;

final class FinderService extends QuestionService
{
    /**
     * @param QuestionId $id
     * @return Question
     * @throws QuestionNotFoundException
     */
    public function __invoke(QuestionId $id): Question
    {
        $question = $this->questionRepository->findOneByCriteria(criteria: array(
            'id' => $id->id()
        ));
        if (is_null($question)) {
            throw new QuestionNotFoundException;
        }
        return $question;
    }
}