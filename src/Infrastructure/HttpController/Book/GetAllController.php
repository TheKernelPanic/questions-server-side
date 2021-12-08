<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\HttpController\Book;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use QuestionsServerSide\Application\Helper\HeaderResponseHelper;
use QuestionsServerSide\Application\Service\Book\FindAllService;
use QuestionsServerSide\Domain\Book\BookRepositoryInterface;
use QuestionsServerSide\Infrastructure\HttpController\BaseController;
use QuestionsServerSide\Infrastructure\HttpController\HttpControllerInterface;

class GetAllController extends BaseController implements HttpControllerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $service = new FindAllService(
            bookRepository: $this->container->get(BookRepositoryInterface::class)
        );
        $payload = $this->container->get(Serializer::class)
            ->serialize(data: $service(), format: 'json', context: $this->container->get(SerializationContext::class));

        $response->getBody()->write(string: $payload);

        return HeaderResponseHelper::addMandatoryHeaders(
            response: $response
                ->withStatus(code: 200)
        );
    }
}