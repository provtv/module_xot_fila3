<?php

declare(strict_types=1);

namespace Modules\Xot\Providers;

use Filament\Facades\Filament;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Modules\Xot\Http\Middleware\SetDefaultLocaleForUrls;
use Modules\Xot\Http\Middleware\SetDefaultTenantForUrlsMiddleware;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
=======
<<<<<<< HEAD
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)

// public function boot(\Illuminate\Routing\Router $router)

// --- bases -----

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
class RouteServiceProvider extends ServiceProvider
{
    /**
     * The root namespace to assume when generating URLs to actions.
     */
    protected string $rootNamespace = 'Modules\Xot\Http\Controllers';

    /**
     * The module namespace to assume when generating URLs to actions.
     */
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
class RouteServiceProvider extends XotBaseRouteServiceProvider
{
    public string $name = 'Xot';

>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    protected string $moduleNamespace = 'Modules\Xot\Http\Controllers';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    public string $name = 'Xot';

    /**
     * Called before routes are registered.
     * Register any model bindings or pattern based filters.
     */
    public function boot(): void
    {
        parent::boot();
        $router = app('router');

        $this->registerLang();
        $this->registerRoutePattern($router);
        $this->registerMyMiddleware($router);
    }

    /**
     * Define the routes for the application.
     */
    public function map(): void
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
            ->namespace($this->moduleNamespace)
            ->group(base_path('Modules/Xot/routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     * These routes are typically stateless.
     */
    protected function mapApiRoutes(): void
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->moduleNamespace)
            ->group(base_path('Modules/Xot/routes/api.php'));
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
    public function boot(): void
    {
        parent::boot();
        // 36     Cannot access offset 'router' on Illuminate\Contracts\Foundation\Application
        // $router = $this->app['router'];
        $router = app('router');
        // dddx([$router, $router1]);

        $this->registerLang();

        $this->registerRoutePattern($router);
        $this->registerMyMiddleware($router);

        // $lang = request()->user()?->locale ?? app()->getLocale();
        // URL::defaults(['locale' => $request->user()?->locale]);
        // URL::defaults(['lang' => $lang]);
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    }

    public function registerMyMiddleware(Router $router): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        // $router->prependMiddlewareToGroup('web', SetDefaultLocaleForUrls::class);
        // $router->prependMiddlewareToGroup('api', SetDefaultLocaleForUrls::class);
        // $router->pushMiddlewareToGroup('web', \Spatie\ResponseCache\Middlewares\CacheResponse::class);
        // $router->pushMiddlewareToGroup('api', \Spatie\ResponseCache\Middlewares\CacheResponse::class);
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        $router->prependMiddlewareToGroup('web', SetDefaultTenantForUrlsMiddleware::class);
        $router->prependMiddlewareToGroup('api', SetDefaultTenantForUrlsMiddleware::class);
    }

    public function registerLang(): void
    {
        $langs = ['it', 'en'];
        $user = request()->user();
        $lang = app()->getLocale();
        if ($user !== null) {
<<<<<<< HEAD
=======
<<<<<<< HEAD
        if ($user !== null) {
=======
        if (null !== $user) {
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            $lang = $user->lang ?? $lang;
        }
        $locales = config('laravellocalization.supportedLocales');
        if (is_array($locales)) {
            $langs = array_keys($locales);
        }

        if (in_array(request()->segment(1), $langs, false)) {
            $lang = request()->segment(1);
            if ($lang !== null) {
<<<<<<< HEAD
=======
<<<<<<< HEAD
        if (in_array(request()->segment(1), $langs, false)) {
            $lang = request()->segment(1);
            if ($lang !== null) {
=======
        // if (! \is_array($langs)) {
        //    throw new \Exception('[.__LINE__.]['.class_basename(__CLASS__).']');
        // }

        if (\in_array(request()->segment(1), $langs, false)) {
            $lang = request()->segment(1);
            if (null !== $lang) {
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
                app()->setLocale($lang);
            }
        }

        URL::defaults([
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
            // 'tenant' => Filament::getTenant(),
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            'lang' => $lang,
        ]);
    }

    public function registerRoutePattern(Router $router): void
    {
        $langs = config('laravellocalization.supportedLocales');
        if (! is_array($langs)) {
<<<<<<< HEAD
=======
<<<<<<< HEAD
        $langs = config('laravellocalization.supportedLocales');
        if (! is_array($langs)) {
=======
        // ---------- Lang Route Pattern
        $langs = config('laravellocalization.supportedLocales');
        if (! \is_array($langs)) {
            // throw new \Exception('[.__LINE__.]['.class_basename(__CLASS__).']');
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            $langs = ['it' => 'it', 'en' => 'en'];
        }

        $lang_pattern = collect(array_keys($langs))->implode('|');
        $lang_pattern = '/|'.$lang_pattern.'|/i';

        $router->pattern('lang', $lang_pattern);

        $models = config('morph_map');
        if (! is_array($models)) {
<<<<<<< HEAD
=======
<<<<<<< HEAD

        $models = config('morph_map');
        if (! is_array($models)) {
=======
        // -------------------------------------------------------------

        $models = config('morph_map');
        if (! \is_array($models)) {
            // throw new Exception('[' . print_r($models, true) . '][' . __LINE__ . '][' . class_basename(__CLASS__) . ']');
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            $models = [];
        }

        $models_collect = collect(array_keys($models));
        $models_collect->implode('|');
        $models_collect->map(
            fn ($item) => Str::plural(is_string($item) ? $item : (string) $item)
        )->implode('|');
<<<<<<< HEAD
=======
<<<<<<< HEAD
            fn ($item) => Str::plural(is_string($item) ? $item : (string) $item)
        )->implode('|');
=======
            static fn ($item) => Str::plural((string) $item)
        )->implode('|');

        // $router->pattern('container0', $container0_pattern);
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    }

    // end registerRoutePattern
}
