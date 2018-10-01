<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$configurator = new Nette\Configurator;

$configurator->setDebugMode('82.99.140.158');
$configurator->enableTracy(__DIR__ . '/../log');
$configurator->setTempDirectory(__DIR__ . '/../temp');

$configurator->addConfig(__DIR__ . '/config/config.neon');

if ($_SERVER['HTTP_HOST'] == 'localhost') {
	$configurator->addConfig(__DIR__ . '/config/config.local.neon');
}

return $configurator->createContainer();
