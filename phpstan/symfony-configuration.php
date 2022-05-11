<?php

$env = getenv('APP_ENV');

$xmlContainerFile = 'test' === $env
    ? __DIR__.'/../var/cache/test/App_KernelTestDebugContainer.xml'
    : __DIR__.'/../var/cache/dev/App_KernelDevDebugContainer.xml';

if (!file_exists($xmlContainerFile)) {
    throw new \RuntimeException(sprintf(<<<ERROR
            PHPStan depends on the meta information the Symfony Dependency Injection that the compiler pass writes.
            The meta xml file could not be found: %s.

            To compile the Symfony container do a cache:clear in the current env (%s) with debug: true!
            ERROR, $xmlContainerFile, $env));
}

return [
    'parameters' => [
        'symfony' => [
            'container_xml_path' => $xmlContainerFile,
        ],
    ],
];
