<?php

namespace AdvancedIdeasMechanics\Middleware;

use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;

class CanonicalUrlMiddlewareFactory
{
    public function __invoke(ContainerInterface $container): CanonicalUrlMiddleware
    {
        return new CanonicalUrlMiddleware(
            $container->get(TemplateRendererInterface::class)
        );
    }
}