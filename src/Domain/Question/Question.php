<?php
declare(strict_types=1);

namespace QuestionsDDD\Domain\Question;

use Doctrine\Common\Collections\ArrayCollection;
use JetBrains\PhpStorm\Pure;
use QuestionsDDD\Domain\Timestampable;
use QuestionsDDD\Domain\Translation\Translatable;
use QuestionsDDD\Domain\Translation\Translation;

/**
 * Class Question
 * @package QuestionsDDD\Domain\Question
 */
class Question implements Translatable
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
     * @var ArrayCollection
     */
    private ArrayCollection $answers;

    /**
     * Question constructor.
     */
    #[Pure] public function __construct()
    {
        $this->translations = new ArrayCollection();
        $this->answers = new ArrayCollection();
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