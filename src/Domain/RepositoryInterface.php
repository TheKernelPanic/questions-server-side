<?php
declare(strict_types=1);

namespace QuestionsServerSide\Domain;

/**
 * Interface RepositoryInterface
 * @package QuestionsServerSide\Domain
 */
interface RepositoryInterface
{
    /**
     * @param array $criteria
     * @return object|null
     */
    public function findOneByCriteria(array $criteria): ?object;
}