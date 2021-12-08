<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\HttpController\Question;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use QuestionsServerSide\Application\Helper\HeaderResponseHelper;
use QuestionsServerSide\Application\Service\Question\FinderService;
use QuestionsServerSide\Domain\Question\QuestionId;
use QuestionsServerSide\Domain\Question\QuestionNotFoundException;
use QuestionsServerSide\Domain\Question\QuestionRepositoryInterface;
use QuestionsServerSide\Infrastructure\HttpController\BaseController;
use QuestionsServerSide\Infrastructure\HttpController\HttpControllerInterface;

class GetByIdController extends BaseController implements HttpControllerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     * @throws QuestionNotFoundException
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $questionId = new QuestionId(
            id: $request->getAttribute('questionId')
        );

        $service = new FinderService(
            questionRepository: $this->container->get(QuestionRepositoryInterface::class)
        );
        $response->getBody()->write(
            string: $this->container->get(Serializer::class)->serialize(
                data: $service(
                    id: $questionId
                ),
                format: 'json',
                context: $this->container->get(SerializationContext::class)
            )
        );
        return HeaderResponseHelper::addMandatoryHeaders(
            response: $response
                ->withStatus(code: 200)
        );
    }
}