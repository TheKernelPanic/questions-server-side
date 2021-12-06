<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\HttpController\Lesson;

use JMS\Serializer\Serializer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use QuestionsServerSide\Application\Helper\HeaderResponseHelper;
use QuestionsServerSide\Application\Service\Book\FinderService;
use QuestionsServerSide\Application\Service\Lesson\FindByBookService;
use QuestionsServerSide\Domain\Book\BookId;
use QuestionsServerSide\Domain\Book\BookRecordNotFoundException;
use QuestionsServerSide\Domain\Book\BookRepositoryInterface;
use QuestionsServerSide\Domain\Lesson\LessonRepositoryInterface;
use QuestionsServerSide\Infrastructure\HttpController\BaseController;
use QuestionsServerSide\Infrastructure\HttpController\HttpControllerInterface;

final class GetByBookController extends BaseController implements HttpControllerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     * @throws BookRecordNotFoundException
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $service = new FinderService(
            bookRepository: $this->container->get(BookRepositoryInterface::class)
        );
        $book = $service(
            bookId: new BookId(
                id: $request->getAttribute(name: 'bookId')
            )
        );
        $service = new FindByBookService(
            lessonRepository: $this->container->get(LessonRepositoryInterface::class)
        );
        $response->getBody()->write(
            string: $this->container->get(Serializer::class)->serialize(
                $service(book: $book),
                'json'
            )
        );
        return HeaderResponseHelper::addMandatoryHeaders(
            response: $response->withStatus(code: 200)
        );
    }
}