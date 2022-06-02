<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Driver\XmlDriver;
use Doctrine\ORM\Tools\Setup;
use Doctrine\Persistence\Mapping\Driver\FileDriver;
use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\ClientBuilder;
use JMS\Serializer\Construction\DoctrineObjectConstructor;
use JMS\Serializer\Construction\UnserializeObjectConstructor;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\Exclusion\GroupsExclusionStrategy;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use QuestionsServerSide\Infrastructure\Doctrine\DeserializeManagerRegistry;

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
            if ($parameters['enable_rotation']) {
                $handler = new RotatingFileHandler(filename: $path, level: Logger::DEBUG, bubble: true, filePermission: $parameters['permissions']);
                $handler->setFilenameFormat(filenameFormat: '{filename}-{date}', dateFormat: 'Ymd');
            } else {
                $handler = new StreamHandler(stream: $path, level: Logger::DEBUG, bubble: true, filePermission: $parameters['permissions']);
            }
            $logger->pushHandler(handler: $handler);

            return $logger;
        },

        Serializer::class => static function (ContainerInterface $container): Serializer {
            return SerializerBuilder::create()
                ->setObjectConstructor(
                    constructor: new DoctrineObjectConstructor(
                        managerRegistry: new DeserializeManagerRegistry(
                            entityManager: $container->get(EntityManagerInterface::class)
                        ),
                        fallbackConstructor: new UnserializeObjectConstructor()
                    )
                )
                ->addMetadataDir(dir: __DIR__ . '/../JMS/')
                ->build();
        },

        DeserializationContext::class => static function(): DeserializationContext {
            return DeserializationContext::create()
                ->addExclusionStrategy(new GroupsExclusionStrategy(['INPUT']));
        },

        SerializationContext::class => static function(): SerializationContext {
            return SerializationContext::create()
                ->addExclusionStrategy(new GroupsExclusionStrategy(['OUTPUT']))
                ->setSerializeNull(bool: true);
        },

        Client::class => static function(ContainerInterface $container): Client {
            $clientBuilder = ClientBuilder::create();
            $clientBuilder
                ->setHosts(
                    hosts: $container->get('parameters')['elasticsearch']['hosts']
                )
                ->setBasicAuthentication(
                    username: $container->get('parameters')['elasticsearch']['username'],
                    password: $container->get('parameters')['elasticsearch']['password']
                );
            return $clientBuilder->build();
        }
    );
    $containerBuilder->addDefinitions($definitions);
};