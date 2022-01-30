<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\Doctrine\Entity\Tag;

use QuestionsServerSide\Domain\Tag\Tag;
use QuestionsServerSide\Domain\Tag\TagId;

class TagDoctrine extends Tag
{
    /**
     * @var string
     */
    protected string $id;

    /**
     * @return TagId
     */
    public function getId(): TagId
    {
        return new TagId(
            id: $this->id
        );
    }
}