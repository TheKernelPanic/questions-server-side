<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\HttpController\Help;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\Serializer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use QuestionsServerSide\Application\Helper\HeaderResponseHelper;
use QuestionsServerSide\Application\Service\Help\CreateService;
use QuestionsServerSide\Domain\Help\HelpRepositoryInterface;
use QuestionsServerSide\Infrastructure\Doctrine\Entity\Help\HelpDoctrine;
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
        $help = $this->container->get(Serializer::class)->deserialize(
            data: $request->getBody()->getContents(),
            type: HelpDoctrine::class,
            format: 'json',
            context: $this->container->get(DeserializationContext::class)
        );
        $service = new CreateService(
            helpRepository: $this->container->get(HelpRepositoryInterface::class)
        );
        $service(help: $help);

        return HeaderResponseHelper::addMandatoryHeaders(
            response: $response
                ->withStatus(code: 201)
        );
    }
}