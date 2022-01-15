<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\HttpController\Book;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\Serializer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use QuestionsServerSide\Application\Helper\HeaderResponseHelper;
use QuestionsServerSide\Application\Service\Book\CreateService;
use QuestionsServerSide\Domain\Book\BookRepositoryInterface;
use QuestionsServerSide\Infrastructure\Doctrine\Entity\Book\BookDoctrine;
use QuestionsServerSide\Infrastructure\HttpController\BaseController;
use QuestionsServerSide\Infrastructure\HttpController\HttpControllerInterface;

class PostNewController extends BaseController implements HttpControllerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $book = $this->container->get(Serializer::class)->deserialize(
            data: $request->getBody()->getContents(),
            format: 'json',
            type: BookDoctrine::class,
            context: $this->container->get(DeserializationContext::class)
        );
        $service = new CreateService(
            bookRepository: $this->container->get(BookRepositoryInterface::class)
        );
        $service(book: $book);

        return HeaderResponseHelper::addMandatoryHeaders(
            response: $response
                ->withStatus(code: 201)
        );
    }
}