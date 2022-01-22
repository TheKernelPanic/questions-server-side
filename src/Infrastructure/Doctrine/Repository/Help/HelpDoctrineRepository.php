<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\Doctrine\Repository\Help;

use QuestionsServerSide\Domain\Help\Help;
use QuestionsServerSide\Domain\Help\HelpRepositoryInterface;
use QuestionsServerSide\Infrastructure\Doctrine\Entity\Help\HelpDoctrine;
use QuestionsServerSide\Infrastructure\Doctrine\Repository\DoctrineRepository;

class HelpDoctrineRepository extends DoctrineRepository implements HelpRepositoryInterface
{
    /**
     * @param Help $help
     * @return Help
     */
    public function save(Help $help): Help
    {
        $this->manager->persist($help);
        $this->manager->flush();
        return $help;
    }

    /**
     * @param array $criteria
     * @return object|null
     */
    public function findOneByCriteria(array $criteria): ?object
    {
        return $this->manager->getRepository(HelpDoctrine::class)->findOneBy(criteria: $criteria);
    }

    /**
     * @param array $criteria
     * @return array
     */
    public function findByCriteria(array $criteria): array
    {
        return $this->manager->getRepository(HelpDoctrine::class)->findBy(criteria: $criteria);
    }
}