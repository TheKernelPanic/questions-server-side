<?php
declare(strict_types=1);

namespace QuestionsDDD\Domain\Question;

/**
 * Interface QuestionRepository
 * @package QuestionsDDD\Domain\Question
 */
interface QuestionRepository
{
    /**
     * @param Question $question
     * @return Question
     */
    public function save(Question $question): Question;
}