<?php
declare(strict_types=1);

namespace QuestionsServerSide\Application\Helper;

use Transliterator;

class SlugHelper
{
    /**
     * @var Transliterator
     */
    private Transliterator $transliterator;

    /**
     *
     */
    public function __construct()
    {
        /**
         * @desc The rules as defined in Transform Rules Syntax of UTS #35: Unicode LDML.
         */
        $this->transliterator = Transliterator::createFromRules(
            rules: ':: Any-Latin;:: Latin-ASCII;:: NFD;:: [:Nonspacing Mark:] Remove;:: NFC;:: [:Punctuation:] Remove;:: Lower();[:Separator:] > \'-\''
        );
    }

    /**
     * @param string $text
     * @return string
     */
    public function generate(string $text): string
    {
        return $this->transliterator->transliterate(string: $text);
    }
}