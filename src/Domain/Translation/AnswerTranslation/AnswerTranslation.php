<?php
declare(strict_types=1);

namespace QuestionsDDD\Domain\Translation\AnswerTranslation;

use QuestionsDDD\Domain\Translation\Translation;

/**
 * Class AnswerTranslation
 * @package QuestionsDDD\Domain\Translation\AnswerTranslation
 */
class AnswerTranslation extends Translation
{
    /**
     * @var string
     */
    private string $text;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }
}