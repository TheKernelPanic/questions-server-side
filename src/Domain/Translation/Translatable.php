<?php
declare(strict_types=1);

namespace QuestionsDDD\Domain\Translation;

use Doctrine\Common\Collections\Collection;

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
     * @return Collection
     */
    public function getTranslations(): Collection;
}