<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\HttpController\Help;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use QuestionsServerSide\Application\Helper\HeaderResponseHelper;
use QuestionsServerSide\Application\Service\Help\FindAllByTopicService;
use QuestionsServerSide\Application\Service\Topic\FinderService;
use QuestionsServerSide\Domain\Help\HelpRepositoryInterface;
use QuestionsServerSide\Domain\Topic\TopicId;
use QuestionsServerSide\Domain\Topic\TopicNotFoundException;
use QuestionsServerSide\Domain\Topic\TopicRepositoryInterface;
use QuestionsServerSide\Infrastructure\HttpController\BaseController;
use QuestionsServerSide\Infrastructure\HttpController\HttpControllerInterface;

final class GetByTopicController extends BaseController implements HttpControllerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     * @throws TopicNotFoundException
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $finderTopicService = new FinderService(
            topicRepository: $this->container->get(TopicRepositoryInterface::class)
        );
        $topic = $finderTopicService(
            topicId: new TopicId(
                id: $request->getAttribute(name: 'topicId')
            )
        );
        $findByTopicHelpsService = new FindAllByTopicService(
            helpRepository: $this->container->get(HelpRepositoryInterface::class)
        );
        $helps = $findByTopicHelpsService(
            topic: $topic
        );
        $response->getBody()->write(
            string: $this->container->get(Serializer::class)->serialize(
                data: $helps,
                format: 'json',
                context: $this->container->get(SerializationContext::class)
            )
        );
        return HeaderResponseHelper::addMandatoryHeaders(
            response: $response
        );
    }
}