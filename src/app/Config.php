<?php

declare(strict_types=1);

namespace App;

/**
 * @property-read ?array  $db
 * @property-read ?string $environment
 */
class Config
{
    private array $config = [];
    public function __construct(array $env)
    {
        $this->config = [
            'db' => [
                'host'      => $env['DB_HOST'],
                'dbname'    => $env['DB_NAME'],
                'username'  => $env['DB_USERNAME'],
                'password'  => $env['DB_PASSWORD'],
                'driver'    => $env['DB_DRIVER'] ?? 'pdo_mysql',
            ],
            'environment' => $env['APP_ENVIRONMENT'] ?? 'production'
        ];
    }

    public function __get($name)
    {
        return $this->config[$name] ?? null;
    }
}