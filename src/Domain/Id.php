<?php
declare(strict_types=1);

namespace QuestionsServerSide\Domain;

abstract class Id
{
    /**
     * @param string $id
     */
    public function __construct(
        protected string $id
    ) {}

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }
}