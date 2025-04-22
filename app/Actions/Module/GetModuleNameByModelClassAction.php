<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Module;

use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;

class GetModuleNameByModelClassAction
{
    use QueueableAction;

    public function execute(string $model_class): string
    {
        $module = Str::between($model_class, 'Modules\\', '\Models\\');

<<<<<<< HEAD
<<<<<<< HEAD
        return is_string($module) ? $module : (string) $module;
=======
<<<<<<< HEAD
        return is_string($module) ? $module : (string) $module;
=======
        return (string) $module;
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
        return (string) $module;
>>>>>>> 4ab3760 (.)
    }
}
