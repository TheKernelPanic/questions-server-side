<?php
declare(strict_types=1);

namespace QuestionsDDD\Infrastructure\Repository\Question;

use Doctrine\DBAL\ConnectionException;
use Doctrine\ORM\EntityManagerInterface;
use QuestionsDDD\Domain\Question\Question;
use QuestionsDDD\Domain\Question\QuestionRepositoryInterface;
use QuestionsDDD\Infrastructure\Repository\DoctrineRepository;

/**
 * Class QuestionRepository
 * @package QuestionsDDD\Infrastructure\Repository\Question
 */
class QuestionRepository extends DoctrineRepository implements QuestionRepositoryInterface
{
    /**
     * @param Question $question
     * @throws ConnectionException
     */
    public function transaction(Question $question): void
    {
        $flow = function(EntityManagerInterface $entityManager) use ($question) {
            //TODO: Handle...
        };
        $this->transactionalOperation(flow: $flow);
    }
}