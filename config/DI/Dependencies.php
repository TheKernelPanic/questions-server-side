<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Driver\XmlDriver;
use Doctrine\ORM\Tools\Setup;
use Doctrine\Persistence\Mapping\Driver\FileDriver;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

return static function(ContainerBuilder $containerBuilder): void {

    $definitions = array(

        XmlDriver::class => static function (ContainerInterface $container): FileDriver {
            return new XmlDriver(
                locator: $container->get('parameters')['doctrine']['mapping_files']
            );
        },

        EntityManagerInterface::class => static function (ContainerInterface $container): EntityManagerInterface {
            $configuration = Setup::createXMLMetadataConfiguration(
                paths: $container->get('parameters')['doctrine']['domain_files'],
                isDevMode: $container->get('parameters')['environment_mode'] === 'DEV'
            );
            $entityManager = EntityManager::create(
                connection: $container->get('parameters')['doctrine']['database'],
                config: $configuration
            );
            $entityManager->getConfiguration()->setMetadataDriverImpl(
                driverImpl: $container->get(XmlDriver::class)
            );
            return $entityManager;
        },

        LoggerInterface::class => static function (ContainerInterface $container): LoggerInterface {
            $parameters = $container->get('parameters')['logger'];
            $logger = new Logger(
                name: $parameters['app_name']
            );
            $path = $parameters['directory'] . '/' . $parameters['filename'] . '.log';
            $streamClassname = (int) $parameters['enable_rotation'] ? RotatingFileHandler::class : StreamHandler::class;

            $handler = new $streamClassname(
                filename: $path,
                level: Logger::DEBUG,
                bubble: true,
                filePermission: $parameters['permissions']
            );
            $logger->pushHandler(handler: $handler);

            return $logger;
        }
    );
    $containerBuilder->addDefinitions($definitions);
};