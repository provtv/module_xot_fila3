<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\File;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module;

use function Safe\scandir;

use Spatie\QueueableAction\QueueableAction;

class GetModulePathAction
{
    use QueueableAction;

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    /**
     * Ottiene il percorso di un modulo.
     *
     * @param string $moduleName Il nome del modulo
     *
     * @return string Il percorso completo del modulo
     */
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    public function execute(string $moduleName): string
    {
        try {
            $module_path = Module::getModulePath($moduleName);
        } catch (\Exception) {
            $modulesPath = base_path('Modules');
            if (! File::exists($modulesPath)) {
                return __DIR__.'/../';
            }

            $files = scandir($modulesPath);
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            $moduleNameLower = Str::lower($moduleName);

            $foundModule = collect($files)
                ->filter(
                    static function ($item) use ($moduleNameLower): bool {
                        if (!is_string($item)) {
                            return false;
                        }
                        return Str::lower($item) === $moduleNameLower;
                    }
                )->first();

            // Se non troviamo il modulo, restituiamo un percorso di fallback
            if ($foundModule === null || !is_string($foundModule)) {
                return base_path('Modules/'.$moduleName);
            }

            $module_path = base_path('Modules/'.$foundModule);
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
            $module_path = collect($files)
                ->filter(
                    static fn ($item): bool => Str::lower($item) === Str::lower($moduleName)
                )->first();
            $module_path = base_path('Modules/'.$module_path);
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        }

        return $module_path;
    }
}
