<?php

namespace AdvancedIdeasMechanics\MezzioCanonicalUrl\Middleware;

use Mezzio\Template\TemplateRendererInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

use function explode;
use function trim;

class CanonicalUrlMiddleware implements MiddlewareInterface
{
    private $renderer;

    public function __construct(TemplateRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $uri  = $request->getUri();
        $host = $uri->getHost();

        // Use X-Forwarded-Host if present, extracting the first value if multiple proxies appended to it
        if ($request->hasHeader('X-Forwarded-Host')) {
            $host = trim(explode(',', $request->getHeaderLine('X-Forwarded-Host'))[0]);
        }

        // Construct the full URL for the current page (without query params)
        $canonicalUrl = $uri->getScheme() . '://' . $host . $uri->getPath();

        // Inject it globally into the template renderer
        $this->renderer->addDefaultParam(
            TemplateRendererInterface::TEMPLATE_ALL,
            'canonicalUrl',
            $canonicalUrl
        );

        return $handler->handle($request);
    }
}