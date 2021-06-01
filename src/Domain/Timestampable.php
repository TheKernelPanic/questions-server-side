<?php
declare(strict_types=1);

namespace QuestionsDDD\Domain;

use DateTimeInterface;

/**
 * Trait Timestampable
 * @package QuestionsDDD\Domain
 */
trait Timestampable
{
    /**
     * @var DateTimeInterface
     */
    protected DateTimeInterface $createdAt;

    /**
     * @var DateTimeInterface|null
     */
    protected DateTimeInterface|null $updatedAt;

    /**
     * @return DateTimeInterface
     */
    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param DateTimeInterface $createdAt
     */
    public function setCreatedAt(DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTimeInterface|null $updatedAt
     */
    public function setUpdatedAt(?DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}