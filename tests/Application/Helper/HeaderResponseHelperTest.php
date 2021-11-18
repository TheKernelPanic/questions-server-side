<?php
declare(strict_types=1);

namespace Tests\Application\Helper;

use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;
use Psr\Http\Message\ResponseInterface;
use QuestionsServerSide\Application\Helper\HeaderResponseHelper;

/**
 * Class HeaderResponseHelperTest
 * @package Tests\Application\Helper
 */
class HeaderResponseHelperTest extends TestCase
{
    use ProphecyTrait;

    /**
     * @covers \QuestionsServerSide\Application\Helper\HeaderResponseHelper
     */
    public function testAddMandatoryHeaders(): void
    {
        $responseStub = $this->prophesize(classOrInterface: ResponseInterface::class);
        $responseStub
            ->withHeader(Argument::type(type: 'string'), Argument::type(type: 'string'))
            ->shouldBeCalledTimes(count(HeaderResponseHelper::$mandatoryHeaders))
            ->willReturn($responseStub->reveal());

        HeaderResponseHelper::addMandatoryHeaders(response: $responseStub->reveal());
    }
}