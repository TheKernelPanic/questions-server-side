<?php
declare(strict_types=1);

namespace QuestionsServerSide\Domain\Question;

use QuestionsServerSide\Domain\DomainRecordNotFoundException;

final class QuestionNotFoundException extends DomainRecordNotFoundException
{
    protected $message = 'Question requested not exists';
}