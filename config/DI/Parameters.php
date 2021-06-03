<?php
declare(strict_types=1);

use DI\ContainerBuilder;

return static function(ContainerBuilder $containerBuilder): void {
    $containerBuilder->addDefinitions(definitions: array(
       'parameters' => array(
           'environment_mode' => $_ENV['ENVIRONMENT_MODE'],
           'doctrine' => array(
               'mapping_files' => __DIR__ . '/../ORM/mapping',
               'domain_files' => [__DIR__ . '/../../src/Domain'],
               'database' => array(
                   'driver' => 'pdo_mysql',
                   'charset' => 'utf8',
                   'collate' => 'utf8mb4_general_ci',
                   'port' => $_ENV['DB_PORT'],
                   'host' => $_ENV['DB_HOST'],
                   'user' => $_ENV['DB_USER'],
                   'password' => $_ENV['DB_PASSWORD'],
                   'dbname' => $_ENV['DB_NAME']
               )
           ),
           'logger' => array(
               'directory' => $_ENV['LOG_DIRECTORY'],
               'enable_rotation' => $_ENV['LOG_ROTATION'],
               'filename' => $_ENV['LOG_FILENAME'],
               'app_name' => $_ENV['LOG_APP_NAME'],
               'permissions' => 0664
           )
       )
    ));
};