<?php
declare(strict_types=1);

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use QuestionsServerSide\Application\Helper\HeaderResponseHelper;
use Slim\App;

return static function (App $application): void {

    $application
        ->options(
            pattern: '/{routes:.+}',
            callable: function (ServerRequestInterface $request, ResponseInterface $response) {
                return HeaderResponseHelper::addMandatoryHeaders($response->withStatus(code: 200));
            }
        )
        ->setName(name: 'JavascriptPreflight');

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
        ->post(
            pattern: '/newBook',
            callable: QuestionsServerSide\Infrastructure\HttpController\Book\PostNewController::class
        )
        ->setName(name: 'NewBook');

    $application
        ->get(
            pattern: '/getTopics',
            callable: QuestionsServerSide\Infrastructure\HttpController\Topic\GetAllController::class
        )
        ->setName(name: 'GetAllTopics');

    $application
        ->get(
            pattern: '/getQuestions',
            callable: QuestionsServerSide\Infrastructure\HttpController\Question\GetAllController::class
        )
        ->setName(name: 'GetQuestions');

    $application
        ->get(
            pattern: '/getBooks',
            callable: QuestionsServerSide\Infrastructure\HttpController\Book\GetAllController::class
        )
        ->setName(name: 'GetBooks');

    $application
        ->get(
            pattern: '/getLessons',
            callable: QuestionsServerSide\Infrastructure\HttpController\Lesson\GetAllController::class
        )
        ->setName(name: 'GetLessons');

    $application
        ->post(
            pattern: '/newLesson',
            callable: QuestionsServerSide\Infrastructure\HttpController\Lesson\PostNewController::class
        )
        ->setName(name: 'NewLesson');

    $application
        ->get(
            pattern: '/getLessonsByBook/{bookId}',
            callable: QuestionsServerSide\Infrastructure\HttpController\Lesson\GetByBookController::class
        )
        ->setName(name: 'GetLessonsByBook');

    $application
        ->get(
            pattern: '/getBooksByTopic/{topicId}',
            callable: QuestionsServerSide\Infrastructure\HttpController\Book\GetByTopicController::class
        )
        ->setName(name: 'GetBooksByTopic');
};