<?php
declare(strict_types=1);

namespace QuestionsServerSide\Domain\Help;

use QuestionsServerSide\Domain\RepositoryInterface;

interface HelpRepositoryInterface extends RepositoryInterface
{
    /**
     * @param Help $help
     * @return Help
     */
    public function save(Help $help): Help;

    /**
     * @param array $criteria
     * @return array
     */
    public function findByCriteria(array $criteria): array;
}