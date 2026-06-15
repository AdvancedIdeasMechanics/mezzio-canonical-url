# Mezzio Canonical URL #
PSR-7 Canonical URL middleware for Mezzio applications.

### Composer ###

`composer install advancedideasmechanics/mezzio-canonical-url`

#### Use ####

Update pipeline.php to use Middleware.

Recommend placing between $app->pipe(RouteMiddleware::class); and $app->pipe(ImplicitHeadMiddleware::class);

`$app->pipe(AdvancedIdeasMechanics\MezzioCanonicalUrl\Middleware\CanonicalUrlMiddleware::class);`

Set below in the templates\layout\default.phtml

`if (isset($this->canonicalUrl)) {
     $this->headLink(['rel' => 'canonical', 'href' => $this->canonicalUrl]);
 }`

If you want to override another page, example templates\app\about.phtml

`$this->canonicalUrl = 'https://example.com/about';`

