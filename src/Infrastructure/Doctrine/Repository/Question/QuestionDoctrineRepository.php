<?php
declare(strict_types=1);

namespace QuestionsDDD\Infrastructure\Doctrine\Repository\Question;

use Doctrine\DBAL\ConnectionException;
use Doctrine\ORM\EntityManagerInterface;
use QuestionsDDD\Domain\Question\Question;
use QuestionsDDD\Domain\Question\QuestionRepositoryInterface;
use QuestionsDDD\Infrastructure\Doctrine\Repository\DoctrineRepository;

/**
 * Class QuestionRepository
 * @package QuestionsDDD\Infrastructure\Repository\Question
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
}