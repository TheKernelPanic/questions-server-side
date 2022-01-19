<?php
declare(strict_types=1);

namespace QuestionsServerSide\Domain\Help;

use QuestionsServerSide\Domain\Timestampable;

class Help
{
    use Timestampable;

    /**
     * @param string $title
     * @param string $content
     * @param string $mimetype
     */
    public function __construct(
        protected string $title,
        protected string $content,
        protected string $mimetype
    )
    {}

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getMimetype(): string
    {
        return $this->mimetype;
    }


}