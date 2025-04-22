<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Filament;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Modules\Tenant\Services\TenantService;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

/**
 * Classe per gestire gli elementi di navigazione per i moduli.
 */
<<<<<<< HEAD
=======
<<<<<<< HEAD
/**
 * Classe per gestire gli elementi di navigazione per i moduli.
 */
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
class GetModulesNavigationItems
{
    use QueueableAction;

    /**
     * Ottiene gli elementi di navigazione per i moduli.
     *
     * @return array<int, NavigationItem> Array di elementi di navigazione
<<<<<<< HEAD
=======
<<<<<<< HEAD
     * Ottiene gli elementi di navigazione per i moduli.
     *
     * @return array<int, NavigationItem> Array di elementi di navigazione
=======
     * Undocumented function.
     *
     * @return array<NavigationItem>
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
     */
    public function execute(): array
    {
        $navs = [];

        $modules = TenantService::allModules();
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        Assert::isArray($modules, 'TenantService::allModules() deve restituire un array');

        foreach ($modules as $module) {
            Assert::string($module, 'Il nome del modulo deve essere una stringa');

            $module_low = Str::lower($module);
            Assert::stringNotEmpty($module_low, 'Il nome del modulo convertito in minuscolo non può essere vuoto');

            // Otteniamo il percorso relativo della configurazione
            $relativeConfigPath = config('modules.paths.generator.config.path');
            $relativeConfigPathStr = is_string($relativeConfigPath) ? $relativeConfigPath : 'Config';

            try {
                // Proviamo a ottenere il percorso del modulo
                $configPath = module_path($module, $relativeConfigPathStr);
                Assert::string($configPath, 'Il percorso di configurazione deve essere una stringa');
            } catch (\Exception | \Error $e) {
                // Se fallisce, costruiamo manualmente il percorso
                $configPath = base_path('Modules/'.$module.'/'.$relativeConfigPathStr);
            }

            // Verifichiamo che $configPath sia una stringa valida
            Assert::stringNotEmpty($configPath, 'Il percorso di configurazione non può essere vuoto');

            // Costruiamo il percorso completo del file di configurazione
            $configFilePath = $configPath.'/config.php';

            // Verifichiamo che il file esista
            if (!File::exists($configFilePath)) {
                continue; // Saltiamo questo modulo se il file di configurazione non esiste
            }

            // Carichiamo la configurazione
            try {
                /** @var array<string, mixed> $config */
                $config = File::getRequire($configFilePath);
                Assert::isArray($config, 'Il file di configurazione deve restituire un array');
            } catch (\Exception $e) {
                // Se non riusciamo a caricare la configurazione, passiamo al modulo successivo
                continue;
            }

            // Estraiamo i valori di configurazione con valori predefiniti
            $icon = $config['icon'] ?? 'heroicon-o-question-mark-circle';
            Assert::string($icon, "L'icona deve essere una stringa");

            $role = $module_low.'::admin';
            Assert::stringNotEmpty($role, 'Il ruolo non può essere vuoto');

            $navigation_sort = $config['navigation_sort'] ?? 1;
            Assert::integerish($navigation_sort, 'navigation_sort deve essere un intero');
            $navigation_sort = (int) $navigation_sort;

            // Creiamo l'elemento di navigazione
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======

        foreach ($modules as $module) {
            // if (! Filament::auth()->check()) {
            //    continue;
            // }
            $module_low = Str::lower($module);
            // if (! auth()->user()->can('module_'.$module_low)) {
            //    continue;
            // }

            $relativeConfigPath = config('modules.paths.generator.config.path');
            try {
                $configPath = module_path($module, $relativeConfigPath);
            } catch (\Error $e) {
                $configPath = base_path('Modules/'.$module.'/'.$relativeConfigPath);
            }
            /**
             * @var array
             */
            $config = File::getRequire($configPath.'/config.php');
            Assert::string($icon = $config['icon'] ?? 'heroicon-o-question-mark-circle');
            $role = $module_low.'::admin';
            Assert::integer($navigation_sort = $config['navigation_sort'] ?? 1);
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            $nav = NavigationItem::make($module)
                ->url('/'.$module_low.'/admin')
                ->icon($icon)
                ->group('Modules')
                ->sort($navigation_sort)
                ->visible(
                    static function () use ($role): bool {
<<<<<<< HEAD
=======
<<<<<<< HEAD
                    static function () use ($role): bool {
=======
                    static function () use ($role) {
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
                        $user = Filament::auth()->user();
                        if (null === $user) {
                            return false;
                        }

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
                        // Verifichiamo che il metodo hasRole esista
                        if (!method_exists($user, 'hasRole')) {
                            return false;
                        }

                        return (bool) $user->hasRole($role);
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
                        // Call to an undefined method Illuminate\Foundation\Auth\User::hasRole()
                        return $user->hasRole($role);
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
                    }
                );

            $navs[] = $nav;
        }

        return $navs;
    }
}
