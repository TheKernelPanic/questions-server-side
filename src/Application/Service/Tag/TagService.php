<?php
declare(strict_types=1);

namespace QuestionsServerSide\Application\Service\Tag;

use QuestionsServerSide\Domain\Tag\TagRepositoryInterface;

abstract class TagService
{
    /**
     * @param TagRepositoryInterface $tagRepository
     */
    public function __construct(
        protected TagRepositoryInterface $tagRepository
    )
    {}
}