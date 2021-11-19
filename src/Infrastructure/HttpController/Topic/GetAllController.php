<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\HttpController\Topic;

use JMS\Serializer\Serializer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use QuestionsServerSide\Application\Helper\HeaderResponseHelper;
use QuestionsServerSide\Application\Service\Topic\FindAllService;
use QuestionsServerSide\Domain\Topic\TopicRepositoryInterface;
use QuestionsServerSide\Infrastructure\Doctrine\Entity\Topic\TopicDoctrine;
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
            topicRepository: $this->container->get(TopicRepositoryInterface::class)
        );
        $payload = $this->container->get(Serializer::class)
            ->serialize(data: $service(), format: 'json');

        $response->getBody()->write(string: $payload);

        return HeaderResponseHelper::addMandatoryHeaders(
            response: $response
                ->withStatus(code: 200)
        );
    }
}