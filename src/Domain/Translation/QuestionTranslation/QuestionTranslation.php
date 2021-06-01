<?php
declare(strict_types=1);

namespace QuestionsDDD\Domain\Translation\QuestionTranslation;

use QuestionsDDD\Domain\Translation\Translation;

/**
 * Class QuestionTranslation
 * @package QuestionsDDD\Domain\Translation\QuestionTranslation
 */
class QuestionTranslation extends Translation
{
    /**
     * @var string
     */
    private string $title;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
}