<?php
declare(strict_types=1);

namespace QuestionsServerSide\Infrastructure\HttpController;


use Psr\Container\ContainerInterface;

/**
 * Class BaseController
 * @package QuestionsServerSide\Infrastructure\HttpController
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