<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;
use QuestionsDDD\Domain\Question\QuestionRepositoryInterface;
use QuestionsDDD\Infrastructure\Repository\Question\QuestionRepository;

return static function(ContainerBuilder $containerBuilder): void {

    $definitions = array();

    $doctrineRepositories = array(
        QuestionRepositoryInterface::class => QuestionRepository::class
    );

    foreach ($doctrineRepositories as $interface => $class) {
        $definitions[$interface] = static function (ContainerInterface $container) use ($class) {
            return new $class(manager: $container->get(EntityManagerInterface::class));
        };
    }
    $containerBuilder->addDefinitions($definitions);
};