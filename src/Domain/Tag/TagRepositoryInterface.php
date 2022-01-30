<?php
declare(strict_types=1);

namespace QuestionsServerSide\Domain\Tag;

use QuestionsServerSide\Domain\RepositoryInterface;

interface TagRepositoryInterface extends RepositoryInterface
{
    /**
     * @param Tag $tag
     * @return Tag
     */
    public function save(Tag $tag): Tag;
}