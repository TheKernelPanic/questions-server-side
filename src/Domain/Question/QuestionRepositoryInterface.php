<?php
declare(strict_types=1);

namespace QuestionsDDD\Domain\Question;

/**
 * Interface QuestionRepository
 * @package QuestionsDDD\Domain\Question
 */
interface QuestionRepositoryInterface
{
    /**
     * @param Question $question
     */
    public function transaction(Question $question): void;
}