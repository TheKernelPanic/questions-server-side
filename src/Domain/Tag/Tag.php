<?php
declare(strict_types=1);

namespace QuestionsServerSide\Domain\Tag;

use QuestionsServerSide\Domain\Timestampable;

class Tag
{
    use Timestampable;

    /**
     * @param string $slug
     * @param string $rawText
     */
    public function __construct(
        protected string $slug,
        protected string $rawText
    )
    {}

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }



    /**
     * @return string
     */
    public function getRawText(): string
    {
        return $this->rawText;
    }
}