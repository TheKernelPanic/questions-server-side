<?php
declare(strict_types=1);

namespace QuestionsServerSide\Domain\Book;

use QuestionsServerSide\Domain\DomainRecordNotFoundException;

class BookRecordNotFoundException extends DomainRecordNotFoundException
{
    protected $message = 'Book requested not exists';
}