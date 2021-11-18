<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\HttpController;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Interface HttpControllerInterface
 * @package QuestionsServerSide\Infrastructure\HttpController
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