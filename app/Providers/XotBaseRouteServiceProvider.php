<?php

declare(strict_types=1);

namespace Modules\Xot\Providers;

use Filament\Notifications\Notification;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/**
 * Class XotBaseRouteServiceProvider.
 */
abstract class XotBaseRouteServiceProvider extends RouteServiceProvider
{
    protected string $moduleNamespace = 'Modules\Xot\Http\Controllers';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public string $name = '';

    /**
     * Undocumented function.
     */
    public function boot(): void
    {
        Config::set('extra_conn', Request::segment(2)); // Se configurato va a prendere db diverso
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        // if (method_exists($this, 'bootCallback')) {
        //    $this->bootCallback();
        // }

>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
        parent::boot();
    }

    /**
     * Undocumented function.
     */
    public function map(): void
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Undocumented function.
     */
    protected function mapWebRoutes(): void
    {
<<<<<<< HEAD
        if ('' === $this->name) {
=======
<<<<<<< HEAD
        if ('' === $this->name) {
=======
        if ('' == $this->name) {
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
            Notification::make()
                ->title('Error')
                ->danger()
                ->persistent()
                ->body('on [Name]ServiceProvider and RouteServiceProvider add $name variable')
                ->send();

            return;
        }
        Route::middleware('web')
            ->namespace($this->moduleNamespace)
            ->group($this->module_dir.'/../../routes/web.php');
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        // ->group(module_path($this->name, '/routes/web.php'));
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
    }

    /**
     * Undocumented function.
     */
    protected function mapApiRoutes(): void
    {
        if ('' === $this->name) {
            throw new \Exception('name is empty on ['.static::class.']');
        }
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        // -- da usare il config
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->moduleNamespace)
            ->group($this->module_dir.'/../../routes/api.php');
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        // ->group(module_path($this->name, '/routes/api.php'));
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
    }
}
