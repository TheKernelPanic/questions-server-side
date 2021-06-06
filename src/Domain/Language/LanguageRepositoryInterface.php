<?php
declare(strict_types=1);

namespace QuestionsDDD\Domain\Language;

use QuestionsDDD\Domain\RepositoryInterface;

/**
 * Interface LanguageRepositoryInterface
 * @package QuestionsDDD\Domain\Language
 */
interface LanguageRepositoryInterface extends RepositoryInterface
{
    /**
     * @param Language $language
     * @return Language
     */
    public function save(Language $language): Language;
}