# Mezzio Canonical URL #
PSR-7 Canonical URL middleware for Mezzio applications.

### Composer ###

`composer install advancedideasmechanics/mezzio-canonical-url`

#### Use ####

For pipeline.php Middleware Use.

Recommend placing between $app->pipe(RouteMiddleware::class); and $app->pipe(ImplicitHeadMiddleware::class);

`$app->pipe(AdvancedIdeasMechanics\MezzioCanonicalUrl\Middleware\CanonicalUrlMiddleware::class);`

For route.php Middleware use.

`use AdvancedIdeasMechanics\MezzioCanonicalUrl\Middleware\CanonicalUrlMiddleware;`

`$app->get('/', [CanonicalUrlMiddleware:class, App\Handler\HomePageHandler::class], 'home');`

Set below in the templates\layout\default.phtml

`if (isset($this->canonicalUrl)) {
     $this->headLink(['rel' => 'canonical', 'href' => $this->canonicalUrl]);
 }`

If you want to override another page, example templates\app\about.phtml

`$this->canonicalUrl = 'https://example.com/about';`

