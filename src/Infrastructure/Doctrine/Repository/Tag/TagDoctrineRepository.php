<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\Doctrine\Repository\Tag;

use QuestionsServerSide\Domain\Tag\Tag;
use QuestionsServerSide\Domain\Tag\TagRepositoryInterface;
use QuestionsServerSide\Infrastructure\Doctrine\Entity\Tag\TagDoctrine;
use QuestionsServerSide\Infrastructure\Doctrine\Repository\DoctrineRepository;

class TagDoctrineRepository extends DoctrineRepository implements TagRepositoryInterface
{
    /**
     * @param array $criteria
     * @return object|null
     */
    public function findOneByCriteria(array $criteria): ?object
    {
       return $this->manager->getRepository(TagDoctrine::class)->findOneBy(criteria: $criteria);
    }

    /**
     * @param Tag $tag
     * @return Tag
     */
    public function save(Tag $tag): Tag
    {
        $this->manager->persist($tag);
        $this->manager->flush();
        return $tag;
    }
}