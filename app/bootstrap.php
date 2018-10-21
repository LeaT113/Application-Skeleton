<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$configurator = new Nette\Configurator;

// Register Nette debug mode
$debugMode = $_SERVER['HTTP_HOST'] == 'localhost';

$configurator->setDebugMode($debugMode);
$configurator->enableTracy(__DIR__ . '/../log');
$configurator->setTempDirectory(__DIR__ . '/../temp');

$configurator->addConfig(__DIR__ . '/config/config.neon');

if ($debugMode) {
	$configurator->addConfig(__DIR__ . '/config/config.local.neon');
}

return $configurator->createContainer();
