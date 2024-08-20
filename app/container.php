<?php

use DI\ContainerBuilder;

require_once dirname(__DIR__) . '/vendor/autoload.php';
$builder = new ContainerBuilder();
$builder->useAttributes(true);
$builder->useAutowiring(true);
$builder->addDefinitions(dirname(__DIR__) . '/config.php');

return $builder->build();
