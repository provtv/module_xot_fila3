<?php

/**
<<<<<<< HEAD
 * @see https://github.com/protonemedia/laravel-ffmpeg
=======
<<<<<<< HEAD
 * Azione per ottenere tutti i modelli di un determinato modulo.
=======
 * @see https://github.com/protonemedia/laravel-ffmpeg
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
 */

declare(strict_types=1);

namespace Modules\Xot\Actions\Model;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module;
use ReflectionClass;
use Spatie\QueueableAction\QueueableAction;

class GetAllModelsByModuleNameAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
     * Execute the action.
=======
<<<<<<< HEAD
     * Ottiene tutti i modelli di un modulo specifico.
     *
     * @param string $moduleName Nome del modulo
     *
     * @return array<string, class-string> Array di modelli del modulo
=======
     * Execute the action.
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
     */
    public function execute(string $moduleName): array
    {
        $mod = Module::find($moduleName);
        if (! $mod instanceof \Nwidart\Modules\Module) {
            return [];
        }

<<<<<<< HEAD
        $mod_path = $mod->getPath() . '/Models';
=======
<<<<<<< HEAD
<<<<<<< HEAD
        $mod_path = $mod->getPath() . '/Models';
=======
        $mod_path = $mod->getPath().'/Models';
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
        $mod_path = $mod->getPath().'/Models';
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
        $mod_path = str_replace(['\\', '/'], [\DIRECTORY_SEPARATOR, \DIRECTORY_SEPARATOR], $mod_path);

        $files = File::files($mod_path);
        $data = [];
<<<<<<< HEAD
        $ns = 'Modules\\' . $mod->getName() . '\\Models';
<<<<<<< HEAD
=======
<<<<<<< HEAD
        $ns = 'Modules\\' . $mod->getName() . '\\Models';
=======
        $ns = 'Modules\\'.$mod->getName().'\\Models';
>>>>>>> origin/dev
>>>>>>> origin/dev
=======

=======
        $ns = 'Modules\\'.$mod->getName().'\\Models';
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
        // con la barra davanti non va il search ?
        foreach ($files as $file) {
            $filename = $file->getRelativePathname();
            $ext = '.php';
<<<<<<< HEAD
=======
<<<<<<< HEAD

            if (Str::endsWith($filename, $ext)) {
                $tmp = new \stdClass();
                $name = mb_substr($filename, 0, -mb_strlen($ext));

                /**
                 * @var class-string
                 */
                $class = $ns . '\\' . $name;

                $tmp->class = $class;
                $name = Str::snake($name);
                $tmp->name = $name;

                // 434 Parameter #1 $argument of class ReflectionClass constructor expects class-string<T of object>|T of object, string given.
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
            // dddx(['ext' => $file->getExtension(), get_class_methods($file)]);
            if (Str::endsWith($filename, $ext)) {
                $tmp = new \stdClass();
                $name = mb_substr($filename, 0, -mb_strlen($ext));
                // dddx(['name' => $name, 'name1' => $file->getFilenameWithoutExtension()]);
                /**
                 * @var class-string
                 */
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
                $class = $ns . '\\' . $name;
                //if ($tmp !== null) {
                $tmp->class = $class;
                $name = Str::snake($name);
                $tmp->name = $name;
                //}
<<<<<<< HEAD
=======
=======
                $class = $ns.'\\'.$name;
                if ($tmp !== null) {
                    $tmp->class = $class;
                    $name = Str::snake($name);
                    $tmp->name = $name;
                }
>>>>>>> origin/dev
>>>>>>> origin/dev
                // 434    Parameter #1 $argument of class ReflectionClass constructor expects class-string<T of object>|T of object, string given.
=======
                $class = $ns.'\\'.$name;
                $tmp->class = $class;
                $name = Str::snake($name);
                $tmp->name = $name;
                // 434    Parameter #1 $argument of class ReflectionClass constructor expects class-string<T of object>|T of object, string given.
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
                try {
                    $reflection_class = new \ReflectionClass($tmp->class);
                    if (! $reflection_class->isAbstract()) {
                        $data[$tmp->name] = $tmp->class;
                    }
                } catch (\Exception) {
<<<<<<< HEAD
=======
<<<<<<< HEAD
                    // Ignoriamo le classi che non possono essere riflesse
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
                }
            }
        }

        return $data;
    }
}
