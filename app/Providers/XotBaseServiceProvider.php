<?php

declare(strict_types=1);

namespace Modules\Xot\Providers;

use Illuminate\Support\Arr;
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Modules\Xot\Datas\ComponentFileData;
use Nwidart\Modules\Traits\PathNamespace;
use Modules\Xot\Actions\Blade\RegisterBladeComponentsAction;
use Modules\Xot\Actions\Module\GetModulePathByGeneratorAction;
use Modules\Xot\Actions\Livewire\RegisterLivewireComponentsAction;

use function Safe\realpath;

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Modules\Xot\Actions\Blade\RegisterBladeComponentsAction;
use Modules\Xot\Actions\Livewire\RegisterLivewireComponentsAction;
use Modules\Xot\Datas\ComponentFileData;
use Nwidart\Modules\Traits\PathNamespace;

use function Safe\realpath;

use Webmozart\Assert\Assert;

>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
/**
 * Class XotBaseServiceProvider.
 */
abstract class XotBaseServiceProvider extends ServiceProvider
{
    use PathNamespace;

    public string $name = '';

    public string $nameLower = '';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    protected string $module_base_ns;

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->registerTranslations();
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom($this->module_dir.'/../Database/Migrations');
        $this->registerLivewireComponents();
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======

        $this->registerConfig();
        $this->registerViews();
        // $this->registerFactories();
        $this->loadMigrationsFrom($this->module_dir.'/../Database/Migrations');

        // Illuminate\Contracts\Container\BindingResolutionException: Target class [livewire] does not exist.
        $this->registerLivewireComponents();
        // Illuminate\Contracts\Container\BindingResolutionException: Target class [modules] does not exist.
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        $this->registerBladeComponents();
        $this->registerCommands();
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->nameLower = Str::lower($this->name);
        $this->module_ns = collect(explode('\\', $this->module_ns))->slice(0, -1)->implode('\\');
        $this->app->register($this->module_ns.'\Providers\RouteServiceProvider');
        $this->app->register($this->module_ns.'\Providers\EventServiceProvider');
<<<<<<< HEAD
=======
<<<<<<< HEAD
        $this->app->register($this->module_ns.'\Providers\RouteServiceProvider');
        $this->app->register($this->module_ns.'\Providers\EventServiceProvider');
=======
        $this->app->register(''.$this->module_ns.'\Providers\RouteServiceProvider');
        $this->app->register(''.$this->module_ns.'\Providers\EventServiceProvider');
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        $this->registerBladeIcons();
    }

    public function registerBladeIcons(): void
    {
        if ('' === $this->name) {
            throw new \Exception('name is empty on ['.static::class.']');
        }

        Assert::string($relativePath = config('modules.paths.generator.assets.path'));

        try {
            $svgPath = module_path($this->name, $relativePath.'/../svg');
            if (! is_string($svgPath)) {
                throw new \Exception('Invalid SVG path');
            }
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
            // $resolvedPath = realpath($svgPath);
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            $resolvedPath = $svgPath;
            $svgPath = $resolvedPath;
        } catch (\Error $e) {
            $svgPath = base_path('Modules/'.$this->name.'/'.$relativePath.'/../svg');
            if (! is_string($svgPath)) {
                throw new \Exception('Invalid fallback SVG path');
            }
        }

        $basePath = base_path(DIRECTORY_SEPARATOR);
        $svgPath = str_replace($basePath, '', $svgPath);

        Config::set('blade-icons.sets.'.$this->nameLower.'.path', $svgPath);
        Config::set('blade-icons.sets.'.$this->nameLower.'.prefix', $this->nameLower);
    }

    /**
     * Register views.
     */
    public function registerViews(): void
    {
        if ('' === $this->name) {
            throw new \Exception('name is empty on ['.static::class.']');
        }

        $viewPath = module_path($this->name, 'resources/views');
        if (! is_string($viewPath)) {
            throw new \Exception('Invalid view path');
        }

        $this->loadViewsFrom($viewPath, $this->nameLower);
    }

    /**
     * Register translations.
     */
    public function registerTranslations(): void
    {
        if ('' === $this->name) {
            throw new \Exception('name is empty on ['.static::class.']');
        }

        try {
            $langPath = module_path($this->name, 'lang');
            if (! is_string($langPath)) {
                throw new \Exception('Invalid language path');
            }
            $this->loadTranslationsFrom($langPath, $this->nameLower);
        } catch (\Error $e) {
            $fallbackPath = base_path('Modules/'.$this->name.'/lang');
            $this->loadTranslationsFrom($fallbackPath, $this->nameLower);
        }

        $jsonLangPath = module_path($this->name, 'lang');
        if (! is_string($jsonLangPath)) {
            throw new \Exception('Invalid JSON language path');
        }
        $this->loadJsonTranslationsFrom($jsonLangPath);
    }

    /**
     * Register an additional directory of factories.
     */
    public function registerFactories(): void
    {
        if (! app()->environment('production')) {
            // app(Factory::class)->load($this->module_dir.'/../Database/factories');
        }
    }

    /**
     * Register config.
     */
    protected function registerConfig(): void
    {
        try {
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 4ab3760 (.)
            $configPath = app(GetModulePathByGeneratorAction::class)->execute($this->name, 'config');


            /*
            $this->publishes([
                $configPath => config_path($this->nameLower.'.php'),
            ], 'config');
            */
<<<<<<< HEAD
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
            Assert::string($relativePath = config('modules.paths.generator.config.path'));
            $configPath = module_path($this->name, $relativePath);
            if (! is_string($configPath)) {
                return;
            }

            if (! file_exists($configPath)) {
                return;
            }

            $this->publishes([
                $configPath => config_path($this->nameLower.'.php'),
            ], 'config');

<<<<<<< HEAD
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            $this->mergeConfigFrom($configPath, $this->nameLower);
        } catch (\Exception $e) {
            // Ignore missing configuration
            return;
        }
    }

    public function registerBladeComponents(): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $componentClassPath = app(GetModulePathByGeneratorAction::class)->execute($this->name, 'component-class');

=======
<<<<<<< HEAD
=======
>>>>>>> 4ab3760 (.)
        try{
            $componentsViewPath = app(GetModulePathByGeneratorAction::class)->execute($this->name, 'component-view');
            Blade::anonymousComponentPath($componentsViewPath);
        } catch (\Exception $e) {
            //return;
        }
        // $components_path = realpath(__DIR__.'/../resources/views/components');



        $componentClassPath = app(GetModulePathByGeneratorAction::class)->execute($this->name, 'component-class');

<<<<<<< HEAD
=======
        Assert::string($relativePath = config('modules.paths.generator.component-class.path'));
        $componentClassPath = module_path($this->name, $relativePath);
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        $namespace = $this->module_ns.'\View\Components';
        Blade::componentNamespace($namespace, $this->nameLower);

        app(RegisterBladeComponentsAction::class)
            ->execute(
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
                // $this->module_dir.'/../View/Components',
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
                $componentClassPath,
                $this->module_ns
            );
    }

    /**
     * Register Livewire components.
     */
    public function registerLivewireComponents(): void
    {
        $prefix = '';
        app(RegisterLivewireComponentsAction::class)
            ->execute(
                $this->module_dir.'/../Http/Livewire',
                Str::before($this->module_ns, '\Providers'),
                $prefix
            );
    }

    public function registerCommands(): void
    {
        $prefix = '';

        $comps = app(\Modules\Xot\Actions\File\GetComponentsAction::class)
            ->execute(
                $this->module_dir.'/../Console/Commands',
                'Modules\\'.$this->name.'\\Console\\Commands',
                $prefix,
            );
        if (0 == $comps->count()) {
            return;
        }
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        $commands = $comps->toArray();
        /** @var array<int, array{ns: string}> $commands */
        $commands = array_map(
            static function (mixed $item): string {
                Assert::isArray($item);
                Assert::keyExists($item, 'ns');
                Assert::string($item['ns']);
                return $item['ns'];
            },
            $commands
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
        $commands = Arr::map(
            $comps->items(),
            function (ComponentFileData $item) {
                return $item->ns;
            }
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        );
        $this->commands($commands);
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }
}
