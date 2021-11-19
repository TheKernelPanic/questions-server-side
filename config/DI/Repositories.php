<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;

return static function(ContainerBuilder $containerBuilder): void {

    $definitions = array();

    $doctrineRepositories = array(
        QuestionsServerSide\Domain\Question\QuestionRepositoryInterface::class => QuestionsServerSide\Infrastructure\Doctrine\Repository\Question\QuestionDoctrineRepository::class,
        QuestionsServerSide\Domain\Topic\TopicRepositoryInterface::class => QuestionsServerSide\Infrastructure\Doctrine\Repository\Topic\TopicDoctrineRepository::class,
        QuestionsServerSide\Domain\Lesson\LessonRepositoryInterface::class => QuestionsServerSide\Infrastructure\Doctrine\Repository\Lesson\LessonDoctrineRepository::class,
        QuestionsServerSide\Domain\Book\BookRepositoryInterface::class => QuestionsServerSide\Infrastructure\Doctrine\Repository\Book\BookDoctrineRepository::class
    );

    foreach ($doctrineRepositories as $interface => $class) {
        $definitions[$interface] = static function (ContainerInterface $container) use ($class) {
            return new $class(manager: $container->get(EntityManagerInterface::class));
        };
    }
    $containerBuilder->addDefinitions($definitions);
};