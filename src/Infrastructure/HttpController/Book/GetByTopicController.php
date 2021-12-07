<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\HttpController\Book;

use JMS\Serializer\Serializer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use QuestionsServerSide\Application\Helper\HeaderResponseHelper;
use QuestionsServerSide\Application\Service\Book\FindByTopicService;
use QuestionsServerSide\Application\Service\Topic\FinderService;
use QuestionsServerSide\Domain\Book\BookRepositoryInterface;
use QuestionsServerSide\Domain\Topic\TopicId;
use QuestionsServerSide\Domain\Topic\TopicNotFoundException;
use QuestionsServerSide\Domain\Topic\TopicRepositoryInterface;
use QuestionsServerSide\Infrastructure\HttpController\BaseController;
use QuestionsServerSide\Infrastructure\HttpController\HttpControllerInterface;

class GetByTopicController extends BaseController implements HttpControllerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     * @throws TopicNotFoundException
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $service = new FinderService(
            topicRepository: $this->container->get(TopicRepositoryInterface::class)
        );
        $topic = $service(
            topicId: new TopicId($request->getAttribute('topicId'))
        );
        $service = new FindByTopicService(
            bookRepository: $this->container->get(BookRepositoryInterface::class)
        );
        $response->getBody()->write(
            string: $this->container->get(Serializer::class)->serialize(
                $service(topic: $topic),
                'json'
            )
        );
        return HeaderResponseHelper::addMandatoryHeaders(
            response: $response
                ->withStatus(code: 200)
        );
    }
}