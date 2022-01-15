<?php
declare(strict_types=1);

namespace QuestionsServerSide\Domain\Topic;

use QuestionsServerSide\Domain\DomainRecordNotFoundException;

class TopicNotFoundException extends DomainRecordNotFoundException
{
    protected $message = 'Topic requested not found';
}