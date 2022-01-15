<?php
declare(strict_types=1);

namespace QuestionsServerSide\Domain\Question;

use QuestionsServerSide\Domain\RepositoryInterface;

/**
 * Interface QuestionRepository
 * @package QuestionsServerSide\Domain\Question
 */
interface QuestionRepositoryInterface extends RepositoryInterface
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