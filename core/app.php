<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

putenv('APP_SERVICES_CACHE=' . __DIR__ . '/../.runtime/cache/services.php');
putenv('APP_PACKAGES_CACHE=' . __DIR__ . '/../.runtime/cache/packages.php');
putenv('APP_CONFIG_CACHE='   . __DIR__ . '/../.runtime/cache/config.php');
putenv('APP_ROUTES_CACHE='   . __DIR__ . '/../.runtime/cache/routes-v7.php');
putenv('APP_EVENTS_CACHE='   . __DIR__ . '/../.runtime/cache/events.php');

return Application::configure(basePath: dirname(__DIR__))
	->withProviders([
		\Core\App\Providers\AppServiceProvider::class
	])
	->withRouting(
		web: __DIR__.'/routes/web.php',
		health: '/up',
	)
	->withMiddleware(function (Middleware $middleware) {
		//
	})
	->withExceptions(function (Exceptions $exceptions) {
		//
	})
	->create()
	->useConfigPath(base_path('core/config'));
