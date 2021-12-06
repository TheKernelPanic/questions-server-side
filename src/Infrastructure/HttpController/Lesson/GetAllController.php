<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\HttpController\Lesson;

use JMS\Serializer\Serializer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use QuestionsServerSide\Application\Helper\HeaderResponseHelper;
use QuestionsServerSide\Application\Service\Lesson\FindAllService;
use QuestionsServerSide\Domain\Lesson\LessonRepositoryInterface;
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
            lessonRepository: $this->container->get(LessonRepositoryInterface::class)
        );
        $response->getBody()->write(
            string: $this->container->get(Serializer::class)->serialize(
                $service(), 'json'
            )
        );
        return HeaderResponseHelper::addMandatoryHeaders(
            response: $response
                ->withStatus(code: 200)
        );
    }
}