<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\Doctrine\Repository\Question;

use Doctrine\DBAL\ConnectionException;
use Doctrine\ORM\EntityManagerInterface;
use QuestionsServerSide\Domain\Question\Question;
use QuestionsServerSide\Domain\Question\QuestionRepositoryInterface;
use QuestionsServerSide\Infrastructure\Doctrine\Repository\DoctrineRepository;

/**
 * Class QuestionRepository
 * @package QuestionsServerSide\Infrastructure\Repository\Question
 */
class QuestionDoctrineRepository extends DoctrineRepository implements QuestionRepositoryInterface
{
    /**
     * @param Question $question
     * @throws ConnectionException
     */
    public function transaction(Question $question): void
    {
        $flow = function(EntityManagerInterface $entityManager) use ($question) {
            $entityManager->persist($question);
            // TODO: Handle
            // If not cascade persist.
            $entityManager->flush();
        };
        $this->transactionalOperation(flow: $flow);
    }

    /**
     * @param Question $question
     * @return Question
     */
    public function save(Question $question): Question
    {
        $this->manager->persist($question);
        $this->manager->flush();

        return $question;
    }
}