<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\HttpController;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;

/**
 * Class DefaultController
 * @package QuestionsServerSide\Infrastructure\HttpController
 */
class DefaultController extends BaseController implements HttpControllerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $this->container->get(LoggerInterface::class)->debug('Check health');

        return $response
            ->withStatus(code: 204);
    }
}