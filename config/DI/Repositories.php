<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;
use QuestionsServerSide\Domain\Question\QuestionRepositoryInterface;
use QuestionsServerSide\Infrastructure\Doctrine\Repository\Question\QuestionDoctrineRepository;

return static function(ContainerBuilder $containerBuilder): void {

    $definitions = array();

    $doctrineRepositories = array(
        QuestionRepositoryInterface::class => QuestionDoctrineRepository::class
    );

    foreach ($doctrineRepositories as $interface => $class) {
        $definitions[$interface] = static function (ContainerInterface $container) use ($class) {
            return new $class(manager: $container->get(EntityManagerInterface::class));
        };
    }
    $containerBuilder->addDefinitions($definitions);
};