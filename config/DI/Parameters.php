<?php
declare(strict_types=1);

use DI\ContainerBuilder;

return static function(ContainerBuilder $containerBuilder): void {
    $containerBuilder->addDefinitions(definitions: array(
       'parameters' => array(
           'environment_mode' => $_ENV['ENVIRONMENT_MODE'],
           'doctrine' => array(
               'mapping_files' => __DIR__ . '/../ORM/mapping',
               'domain_files' => __DIR__ . '/../../src/Domain',
               'database' => array(
                   'driver' => '',
                   'charset' => 'utf8',
                   'port' => $_ENV['DB_PORT'],
                   'host' => $_ENV['DB_HOST'],
                   'user' => $_ENV['DB_USER'],
                   'password' => $_ENV['DB_PASSWORD'],
                   'name' => $_ENV['DB_NAME']
               )
           )
       )
    ));
};