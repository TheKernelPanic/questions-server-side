<?php
declare(strict_types=1);

namespace QuestionsDDD\Infrastructure\Repository\Language;

use QuestionsDDD\Domain\Language\Language;
use QuestionsDDD\Domain\Language\LanguageRepositoryInterface;
use QuestionsDDD\Infrastructure\Repository\DoctrineRepository;

/**
 * Class LanguageRepository
 * @package QuestionsDDD\Infrastructure\Repository\Language
 */
class LanguageRepository extends DoctrineRepository implements LanguageRepositoryInterface
{
    /**
     * @param Language $language
     * @return Language
     */
    public function save(Language $language): Language
    {
        $this->manager->persist($language);
        $this->manager->flush();

        return $language;
    }

    /**
     * @param array $criteria
     * @return object|null
     */
    public function findOneByCriteria(array $criteria): ?object
    {
        return $this->manager->getRepository(Language::class)->findOneBy(criteria: $criteria);
    }
}