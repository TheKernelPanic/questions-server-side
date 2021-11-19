<?php
declare(strict_types=1);

namespace QuestionsServerSide\Domain\Question;

/**
 * Interface QuestionRepository
 * @package QuestionsServerSide\Domain\Question
 */
interface QuestionRepositoryInterface
{
    /**
     * @return array
     */
    public function findAll(): array;

    /**
     * @param Question $question
     */
    public function transaction(Question $question): void;

    /**
     * @param Question $question
     * @return mixed
     */
    public function save(Question $question): Question;
}