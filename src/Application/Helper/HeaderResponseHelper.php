<?php
declare(strict_types=1);

namespace QuestionsDDD\Application\Helper;

use Psr\Http\Message\ResponseInterface;

/**
 * Class HeaderResponseHelper
 * @package QuestionsDDD\Application\Helper
 */
class HeaderResponseHelper
{
    /**
     * @var array|string[]
     */
    public static array $mandatoryHeaders = array(
        'Access-Control-Allow-Origin' => '*',
        'Access-Control-Allow-Methods' => 'GET,POST,PUT,DELETE,OPTIONS',
        'Access-Control-Allow-Headers' => 'Content-Type,Authorization',
        'Content-Type' => 'application/json',
        'Server' => 'Server'
    );

    /**
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public static function addMandatoryHeaders(ResponseInterface $response): ResponseInterface
    {
        foreach (self::$mandatoryHeaders as $name => $value) {
            $response = $response->withHeader($name, $value);
        }
        return $response;
    }
}