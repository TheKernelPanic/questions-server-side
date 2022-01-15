<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\HttpController\Question;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\Serializer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use QuestionsServerSide\Application\Helper\HeaderResponseHelper;
use QuestionsServerSide\Application\Service\Question\CreateService;
use QuestionsServerSide\Domain\Question\QuestionRepositoryInterface;
use QuestionsServerSide\Infrastructure\Doctrine\Entity\Question\QuestionDoctrine;
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
        $question = $this->container->get(Serializer::class)->deserialize(
            data: $request->getBody()->getContents(),
            type: QuestionDoctrine::class,
            format: 'json',
            context: $this->container->get(DeserializationContext::class)
        );
        $service = new CreateService(
            questionRepository: $this->container->get(QuestionRepositoryInterface::class)
        );
        $service(question: $question);

        return HeaderResponseHelper::addMandatoryHeaders(
            response: $response
                ->withStatus(code: 201)
        );
    }
}