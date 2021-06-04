<?php
declare(strict_types=1);

use Slim\App;

return static function (App $application): void {

    $application
        ->get(
            pattern: '/',
            callable: QuestionsDDD\Infrastructure\HttpController\DefaultController::class
        )
        ->setName(name: 'CheckHealth');
};