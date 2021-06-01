<?php
declare(strict_types=1);

namespace QuestionsDDD\Domain\Translation;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Interface Translatable
 * @package QuestionsDDD\Domain\Translation
 */
interface Translatable
{
    /**
     * @param Translation $translation
     */
    public function addTranslation(Translation $translation): void;

    /**
     * @return ArrayCollection
     */
    public function getTranslations(): ArrayCollection;
}