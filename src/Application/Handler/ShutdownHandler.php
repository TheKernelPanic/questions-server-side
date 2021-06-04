<?php
declare(strict_types=1);

namespace QuestionsDDD\Application\Handler;

use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpInternalServerErrorException;
use Slim\ResponseEmitter;
use function error_get_last, ob_get_clean, ob_clean;

/**
 * Class ShutdownHandler
 * @package QuestionsDDD\Application\Handler
 */
class ShutdownHandler
{
    /**
     * ShutdownHandler constructor.
     * @param ServerRequestInterface $request
     * @param HttpErrorHandler $httpErrorHandler
     * @param bool $debugMode
     */
    public function __construct(
        private ServerRequestInterface $request,
        private HttpErrorHandler $httpErrorHandler,
        private bool $debugMode = false
    )
    {}

    /**
     *
     */
    public function __invoke(): void
    {
        if (!$error = error_get_last()) {
            return;
        }
        $exception = new HttpInternalServerErrorException(
            request: $this->request,
            message: $error['message']
        );
        $response = $this->httpErrorHandler->__invoke(
            request: $this->request,
            exception: $exception,
            displayErrorDetails: $this->debugMode,
            logErrors: $this->debugMode,
            logErrorDetails: $this->debugMode
        );

        if (ob_get_clean()) {
            ob_clean();
        }
        (new ResponseEmitter())->emit(response: $response);
    }
}