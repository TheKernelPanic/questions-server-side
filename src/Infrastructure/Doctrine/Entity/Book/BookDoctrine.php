<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\Doctrine\Entity\Book;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use QuestionsServerSide\Domain\Book\Book;

class BookDoctrine extends Book
{
    /**
     * @var string
     */
    private string $id;

    /**
     * @var Collection
     */
    private Collection $lessons;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return Collection|ArrayCollection
     */
    public function getLessons(): Collection|ArrayCollection
    {
        return $this->lessons;
    }
}