<?php
declare(strict_types=1);

namespace QuestionsServerSide\Application\Service\Help;

use QuestionsServerSide\Domain\Help\HelpRepositoryInterface;

abstract class HelpService
{
    /**
     * @param HelpRepositoryInterface $helpRepository
     */
    public function __construct(
        protected HelpRepositoryInterface $helpRepository
    )
    {}
}