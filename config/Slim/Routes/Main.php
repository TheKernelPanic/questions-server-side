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
        ->get(
            pattern: '/getTopics',
            callable: QuestionsServerSide\Infrastructure\HttpController\Topic\GetAllController::class
        )
        ->setName(name: 'GetAllTopics');
};