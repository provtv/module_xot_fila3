<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\View;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;
use Modules\Xot\Actions\Module\GetModuleNameByModelClassAction;

class GetViewByClassAction
{
    use QueueableAction;

    /**
     * "Modules\UI\Filament\Widgets\GroupWidget" => "ui::filament.widgets.group"
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
     * @return view-string
     */
    public function execute(string $class, string $suffix = ''): string
    {
        $module = Str::of($class)->betweenFirst('Modules\\', '\\')->toString();
        $module_low = Str::of($module)->lower()->toString();
        $after = Str::of($class)
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
     */
    public function execute(string $class, string $suffix=''): string
    {
        $module = Str::of($class)->betweenFirst('Modules\\', '\\')->toString();
        $module_low = Str::of($module)->lower()->toString();
        $after=Str::of($class)
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            ->after('Modules\\'.$module.'\\')
            ->explode('\\')
            ->toArray();

        $mapped = Arr::map($after, function (string $value, int $key) use ($after) {
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            if ($key > 0 && isset($after[$key - 1])) {
                /** @var mixed $prevValue */
                $prevValue = $after[$key - 1];

                // Gestione sicura delle conversioni di tipo per PHPStan level 10
                $prevValueStr = '';

                if (is_string($prevValue)) {
                    $prevValueStr = $prevValue;
                } elseif ($prevValue === null) {
                    $prevValueStr = '';
                } elseif (is_scalar($prevValue)) {
                    // Cast sicuro per valori scalari (int, float, bool)
<<<<<<< HEAD
<<<<<<< HEAD
                   // $prevValueStr = is_string($prevValue) ? $prevValue : (string) $prevValue;
                   $prevValueStr = strval( $prevValue);
=======
<<<<<<< HEAD
                   // $prevValueStr = is_string($prevValue) ? $prevValue : (string) $prevValue;
                   $prevValueStr = strval( $prevValue);
=======
                    $prevValueStr = is_string($prevValue) ? $prevValue : (string) $prevValue;
>>>>>>> origin/dev
>>>>>>> origin/dev
=======

                   // Utilizziamo il cast esplicito con controllo di tipo per PHPStan Level 9
                   $prevValueStr = is_scalar($prevValue) ? (string) $prevValue : '';
>>>>>>> 50bb41c (fix: auto resolve conflict)
                }

                $singular = Str::of($prevValueStr)->singular()->toString();
                if (Str::endsWith($value, $singular)) {
                    $value = Str::of($value)->beforeLast($singular)->toString();
                }
            }

            return Str::of($value)->slug()->toString();
        });

        $implode = implode('.', $mapped);
        $view = $module_low.'::'.$implode.$suffix;

        if (!view()->exists($view)) {
            throw new \Exception('View not found: '.$view);
        }

        return $view;
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
            if($key>0 && isset($after[$key-1])) {
                $singular = Str::of($after[$key-1])->singular()->toString();
                if(Str::endsWith($value, $singular)) {
                    $value=Str::of($value)->beforeLast($singular)->toString();
                }
            }
            return Str::of($value)->slug()->toString();
        });

        $implode=implode('.', $mapped);
        $view=$module_low.'::'.$implode.$suffix;

        return $view;
        
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    }
}
