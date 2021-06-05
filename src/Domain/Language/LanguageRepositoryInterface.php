<?php
declare(strict_types=1);

namespace QuestionsDDD\Domain\Language;

/**
 * Interface LanguageRepositoryInterface
 * @package QuestionsDDD\Domain\Language
 */
interface LanguageRepositoryInterface
{
    /**
     * @param Language $language
     * @return Language
     */
    public function save(Language $language): Language;
}