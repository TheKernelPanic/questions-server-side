<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Driver\XmlDriver;
use Doctrine\ORM\Tools\Setup;
use Doctrine\Persistence\Mapping\Driver\FileDriver;
use Psr\Container\ContainerInterface;

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
        }
    );
    $containerBuilder->addDefinitions($definitions);
};