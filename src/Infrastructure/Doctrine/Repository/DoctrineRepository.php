<?php
declare(strict_types=1);

namespace QuestionsDDD\Infrastructure\Doctrine\Repository;

use Doctrine\DBAL\ConnectionException;
use Doctrine\ORM\EntityManagerInterface;
use Throwable;

/**
 * Class DoctrineRepository
 * @package QuestionsDDD\Infrastructure\Repository
 */
abstract class DoctrineRepository
{
    /**
     * DoctrineRepository constructor.
     * @param EntityManagerInterface $manager
     */
    public function __construct(
        protected EntityManagerInterface $manager
    )
    {}

    /**
     * @param callable $flow
     * @throws ConnectionException
     */
    protected function transactionalOperation(callable $flow): void
    {
        $this->manager->getConnection()->beginTransaction();
        try {
            $flow($this->manager);
            $this->manager->commit();
        } catch (ConnectionException $exception) {
            $this->manager->getConnection()->rollBack();
            throw $exception;
        }
    }
}