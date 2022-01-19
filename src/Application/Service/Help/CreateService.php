<?php
declare(strict_types=1);

namespace QuestionsServerSide\Application\Service\Help;

use DateTimeImmutable;
use QuestionsServerSide\Domain\Help\Help;

final class CreateService extends HelpService
{
    /**
     * @param Help $help
     * @return void
     */
    public function __invoke(Help $help): void
    {
        $help->setCreatedAt(createdAt: new DateTimeImmutable);

        $this->helpRepository->save(help: $help);
    }
}