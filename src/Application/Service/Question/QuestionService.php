<?php
declare(strict_types=1);

namespace QuestionsServerSide\Application\Service\Question;

use QuestionsServerSide\Domain\Question\QuestionRepositoryInterface;

abstract class QuestionService
{
    /**
     * @param QuestionRepositoryInterface $questionRepository
     */
    public function __construct(
        protected QuestionRepositoryInterface $questionRepository
    ) {}
}