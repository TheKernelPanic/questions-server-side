<?php
declare(strict_types=1);

namespace QuestionsServerSide\Application\Service\Question;

final class FindAllService extends QuestionService
{
    /**
     * @return array
     */
    public function __invoke(): array
    {
        return $this->questionRepository->findAll();
    }
}