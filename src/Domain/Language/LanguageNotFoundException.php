<?php
declare(strict_types=1);

namespace QuestionsDDD\Domain\Language;

use QuestionsDDD\Domain\DomainRecordNotFoundException;

/**
 * Class LanguageNotFoundException
 * @package QuestionsDDD\Domain\Language
 */
class LanguageNotFoundException extends DomainRecordNotFoundException
{
    /**
     * @var string
     */
    protected $message = 'Language request not exists';
}