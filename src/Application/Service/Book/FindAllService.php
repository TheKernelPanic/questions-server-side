<?php
declare(strict_types=1);

namespace QuestionsServerSide\Application\Service\Book;

class FindAllService extends BookService
{
    /**
     * @return array
     */
    public function __invoke(): array
    {
        return $this->bookRepository->findAll();
    }
}