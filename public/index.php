<?php
declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use QuestionsServerSide\Application\Handler\HttpErrorHandler;
use QuestionsServerSide\Application\Handler\ShutdownHandler;
use Slim\Factory\AppFactory;
use Slim\Factory\ServerRequestCreatorFactory;

/**
 * @var ContainerInterface $container
 */
$container = require_once __DIR__ . '/../bootstrap.php';

AppFactory::setContainer(container: $container);

$application = AppFactory::create();
$callableResolver = $application->getCallableResolver();

/**
 * Routing
 */
$mainRoutes = require_once __DIR__ . '/../config/Slim/Routes/Main.php';
$mainRoutes($application);

$serverRequest = ServerRequestCreatorFactory::create()->createServerRequestFromGlobals();

$isDebugMode = $container->get('parameters')['environment_mode'] === 'DEV';

$httpErrorHandler = new HttpErrorHandler(
    callableResolver: $application->getCallableResolver(),
    responseFactory: $application->getResponseFactory(),
    logger: $container->get(LoggerInterface::class)
);
$shutdownHandler = new ShutdownHandler(
    request: $serverRequest,
    httpErrorHandler: $httpErrorHandler,
    debugMode: $isDebugMode
);

$errorMiddleware = $application->addErrorMiddleware(
    displayErrorDetails: $isDebugMode,
    logErrors: false,
    logErrorDetails: false
);
$errorMiddleware->setDefaultErrorHandler(
    handler: $httpErrorHandler
);

$application->run();