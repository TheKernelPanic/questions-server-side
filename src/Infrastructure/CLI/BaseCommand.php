<?php
declare(strict_types=1);

namespace QuestionsDDD\Infrastructure\CLI;


use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Command\Command;

/**
 * Class BaseCommand
 * @package QuestionsDDD\Infrastructure\CLI
 */
class BaseCommand extends Command
{
    /**
     * BaseCommand constructor.
     * @param ContainerInterface $container
     */
    public function __construct(
        protected ContainerInterface $container
    )
    {
        parent::__construct();
    }
}