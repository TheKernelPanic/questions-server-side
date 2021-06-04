<?php
declare(strict_types=1);

namespace QuestionsDDD\Infrastructure\HttpController;


use Psr\Container\ContainerInterface;

/**
 * Class BaseController
 * @package QuestionsDDD\Infrastructure\HttpController
 */
abstract class BaseController
{
    /**
     * BaseController constructor.
     * @param ContainerInterface $container
     */
    public function __construct(
        protected ContainerInterface $container
    )
    {}
}