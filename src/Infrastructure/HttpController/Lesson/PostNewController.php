<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\HttpController\Lesson;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\Exception\Exception;
use JMS\Serializer\Serializer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use QuestionsServerSide\Application\Helper\HeaderResponseHelper;
use QuestionsServerSide\Application\Service\Lesson\CreateService;
use QuestionsServerSide\Domain\Lesson\LessonRepositoryInterface;
use QuestionsServerSide\Infrastructure\Doctrine\Entity\Lesson\LessonDoctrine;
use QuestionsServerSide\Infrastructure\HttpController\BaseController;
use QuestionsServerSide\Infrastructure\HttpController\HttpControllerInterface;
use Slim\Exception\HttpBadRequestException;

final class PostNewController extends BaseController implements HttpControllerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     * @throws HttpBadRequestException
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $lesson = $this->container->get(Serializer::class)->deserialize(
                data: $request->getBody()->getContents(),
                type: LessonDoctrine::class,
                format: 'json',
                context: $this->container->get(DeserializationContext::class)
            );
        } catch (Exception $exception) {
            throw new HttpBadRequestException(
                request: $request,
                message: $exception->getMessage()
            );
        }
        $service = new CreateService(
            lessonRepository: $this->container->get(LessonRepositoryInterface::class)
        );
        $service(lesson: $lesson);

        return HeaderResponseHelper::addMandatoryHeaders(
            response: $response
                ->withStatus(code: 201)
        );
    }
}