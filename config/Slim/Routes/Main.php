<?php
declare(strict_types=1);

use Slim\App;

return static function (App $application): void {

    $application
        ->get(
            pattern: '/',
            callable: QuestionsServerSide\Infrastructure\HttpController\DefaultController::class
        )
        ->setName(name: 'CheckHealth');

    $application
        ->post(
            pattern: '/newQuestion',
            callable: QuestionsServerSide\Infrastructure\HttpController\Question\PostNewController::class
        )
        ->setName(name: 'NewQuestion');

    $application
        ->get(
            pattern: '/getTopics',
            callable: QuestionsServerSide\Infrastructure\HttpController\Topic\GetAllController::class
        )
        ->setName(name: 'GetAllTopics');
};