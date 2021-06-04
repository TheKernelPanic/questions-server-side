<?php
declare(strict_types=1);

namespace QuestionsDDD\Infrastructure\HttpController;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Interface HttpControllerInterface
 * @package QuestionsDDD\Infrastructure\HttpController
 */
interface HttpControllerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface;
}