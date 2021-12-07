<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\Doctrine\Entity\Book;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use QuestionsServerSide\Domain\Book\Book;
use QuestionsServerSide\Domain\Book\BookId;

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
     * @return BookId
     */
    public function getId(): BookId
    {
        return new BookId(id: $this->id);
    }

    /**
     * @return Collection|ArrayCollection
     */
    public function getLessons(): Collection|ArrayCollection
    {
        return $this->lessons;
    }
}