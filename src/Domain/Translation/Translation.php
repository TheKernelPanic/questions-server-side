<?php
declare(strict_types=1);

namespace QuestionsDDD\Domain\Translation;

use QuestionsDDD\Domain\Language\Language;

/**
 * Class Translation
 */
abstract class Translation
{
    /**
     * @var string
     */
    protected string $id;

    /**
     * Translation constructor.
     * @param Language $language
     */
    public function __construct(
        protected Language $language
    )
    {}

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return Language
     */
    public function getLanguage(): Language
    {
        return $this->language;
    }
}