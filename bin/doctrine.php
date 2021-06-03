<?php
declare(strict_types=1);

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

try {
    $container = require_once __DIR__ . '/../bootstrap.php';
    $helperSet = ConsoleRunner::createHelperSet($container->get(EntityManagerInterface::class));

    ConsoleRunner::run($helperSet, []);

} catch (Throwable $exception) {
    print_r($exception->getMessage());
}