<?php
declare(strict_types=1);

namespace QuestionsDDD\Domain\Language;

/**
 * Class Language
 * @package QuestionsDDD\Domain\Language
 */
class Language
{
    /**
     * @var string
     */
    private string $id;

    /**
     * Language constructor.
     * @param string $name
     * @param string $isoCode
     */
    public function __construct(
        private string $name,
        private string $isoCode
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getIsoCode(): string
    {
        return $this->isoCode;
    }
}