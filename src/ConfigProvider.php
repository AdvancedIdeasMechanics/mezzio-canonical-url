<?php

declare(strict_types=1);

namespace AdvancedIdeasMechanics\MezzioCanonicalUrl;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
        ];
    }

    public function getDependencies(): array
    {
        return [
            'factories' => [
                // Point the middleware directly to its dedicated factory class string
                Middleware\CanonicalUrlMiddleware::class => Middleware\CanonicalUrlMiddlewareFactory::class,
            ],
        ];
    }
}