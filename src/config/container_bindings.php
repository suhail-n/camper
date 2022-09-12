<?php

declare(strict_types=1);

use App\Config;
use App\Services\Greeter;
use App\Services\Person;
use function DI\create;

use Slim\Views\Twig;


return [
    Config::class => create(Config::class)->constructor($_ENV),
    Person::class => create(Person::class)->constructor("Foo Bar!!!!!"),
    Greeter::class => fn (Person $person) => new Greeter($person),
    Twig::class => fn (Config $config) => Twig::create(
        VIEW_PATH,
        [
            'cache' => VIEW_CACHE,
            'auto_reload' => $config->environment === 'development'
        ]
    )
];
