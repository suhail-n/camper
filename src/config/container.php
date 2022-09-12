<?php

declare(strict_types=1);

use DI\ContainerBuilder;

$builder = new ContainerBuilder();
$builder->addDefinitions(__DIR__ . '/container_bindings.php');

return $builder->build();