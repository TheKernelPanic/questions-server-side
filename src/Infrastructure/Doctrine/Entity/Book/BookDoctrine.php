<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\Doctrine\Entity\Book;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use QuestionsServerSide\Domain\Book\Book;
use QuestionsServerSide\Domain\Book\BookId;
use QuestionsServerSide\Infrastructure\Doctrine\Entity\Topic\TopicDoctrine;

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
     * @var TopicDoctrine|null
     */
    private ?TopicDoctrine $topic;

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

    /**
     * @return TopicDoctrine|null
     */
    public function getTopic(): ?TopicDoctrine
    {
        return $this->topic;
    }

    /**
     * @param TopicDoctrine|null $topic
     */
    public function setTopic(?TopicDoctrine $topic): void
    {
        $this->topic = $topic;
    }


}