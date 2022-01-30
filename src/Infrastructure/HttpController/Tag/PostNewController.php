<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\HttpController\Tag;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use QuestionsServerSide\Application\Helper\HeaderResponseHelper;
use QuestionsServerSide\Application\Service\Tag\CreateService;
use QuestionsServerSide\Domain\Tag\TagRepositoryInterface;
use QuestionsServerSide\Infrastructure\Doctrine\Entity\Tag\TagDoctrine;
use QuestionsServerSide\Infrastructure\HttpController\BaseController;
use QuestionsServerSide\Infrastructure\HttpController\HttpControllerInterface;

final class PostNewController extends BaseController implements HttpControllerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $tag = $this->container->get(Serializer::class)->deserialize(
            data: $request->getBody()->getContents(),
            type: TagDoctrine::class,
            format: 'json',
            context: $this->container->get(DeserializationContext::class)
        );
        $service = new CreateService(
            tagRepository: $this->container->get(TagRepositoryInterface::class)
        );
        $response->getBody()->write(
            string: $this->container->get(Serializer::class)
                ->serialize(
                    data: $service(
                        tag: $tag
                    ),
                    format: 'json',
                    context: $this->container->get(SerializationContext::class)
                )
        );
        return HeaderResponseHelper::addMandatoryHeaders(
            response: $response
                ->withStatus(code: 201)
        );
    }
}