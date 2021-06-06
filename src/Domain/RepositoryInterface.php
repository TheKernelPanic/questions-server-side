<?php
declare(strict_types=1);

namespace QuestionsDDD\Domain;

/**
 * Interface RepositoryInterface
 * @package QuestionsDDD\Domain
 */
interface RepositoryInterface
{
    /**
     * @param array $criteria
     * @return object|null
     */
    public function findOneByCriteria(array $criteria): ?object;
}