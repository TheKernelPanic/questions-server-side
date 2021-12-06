<?php
declare(strict_types=1);

namespace QuestionsServerSide\Application\Service\Lesson;

use QuestionsServerSide\Domain\Book\Book;

final class FindByBookService extends LessonService
{
    /**
     * @param Book $book
     * @return array
     */
    public function __invoke(Book $book): array
    {
        return $this->lessonRepository->findManyByCriteria(
            criteria: array(
                'book' => $book
            )
        );
    }
}