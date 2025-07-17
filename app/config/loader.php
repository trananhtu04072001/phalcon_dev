<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir
    ]
);
$loader->registerNamespaces([
    'App\Services' => 'app/services/',
    'App\Models' => 'app/models/',
    'App\Validations' => 'app/validations/',
    'App\Helpers' => 'app/helpers/'
]);
$loader->register();
