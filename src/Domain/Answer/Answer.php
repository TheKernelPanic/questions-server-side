<?php
declare(strict_types=1);

namespace QuestionsDDD\Domain\Answer;

use Doctrine\Common\Collections\ArrayCollection;
use JetBrains\PhpStorm\Pure;
use QuestionsDDD\Domain\Timestampable;
use QuestionsDDD\Domain\Translation\Translatable;
use QuestionsDDD\Domain\Translation\Translation;

/**
 * Class Answer
 * @package QuestionsDDD\Domain\Answer
 */
class Answer implements Translatable
{
    use Timestampable;

    /**
     * @var string
     */
    private string $id;

    /**
     * @var ArrayCollection
     */
    private ArrayCollection $translations;

    /**
     * Answer constructor.
     * @param bool $result
     * @param int $position
     */
    #[Pure] public function __construct(
        private bool $result,
        private int $position
    )
    {
        $this->translations = new ArrayCollection();
    }

    /**
     * @return bool
     */
    public function isResult(): bool
    {
        return $this->result;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param Translation $translation
     */
    public function addTranslation(Translation $translation): void
    {
        if ($this->translations->contains(element: $translation)) {
            return;
        }
        $this->translations->add(element: $translation);
    }

    /**
     * @return ArrayCollection
     */
    public function getTranslations(): ArrayCollection
    {
        return $this->translations;
    }
}