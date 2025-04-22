<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Traits;

<<<<<<< HEAD
use TypeError;
=======
<<<<<<< HEAD
use TypeError;
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\Lang\Actions\SaveTransAction;
use Modules\Xot\Actions\GetTransKeyAction;

trait TransTrait
{
    /**
     * Get translation for a given key.
     *
     * @throws \Exception Se exceptionIfNotExist è true e la traduzione non esiste
     */
    public static function trans(string $key, bool $exceptionIfNotExist = false): string
    {
        $tmp = static::getKeyTrans($key);
        /** @var string|array<int|string,mixed>|null $res */
        $res = trans($tmp);

        if (is_string($res)) {
            if ($exceptionIfNotExist && $res === $tmp) {
<<<<<<< HEAD
                throw new \Exception('[' . __LINE__ . '][' . class_basename(__CLASS__) . ']');
=======
<<<<<<< HEAD
<<<<<<< HEAD
                throw new \Exception('[' . __LINE__ . '][' . class_basename(__CLASS__) . ']');
=======
                throw new \Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
                throw new \Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
            }

            return $res;
        }

        if (is_array($res)) {
            $first = current($res);
            if (is_string($first) || is_numeric($first)) {
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
                return is_string($first) ? $first : (string) $first;
            }
        }

<<<<<<< HEAD
<<<<<<< HEAD
        return 'fix:' . $tmp;
=======
<<<<<<< HEAD
        return 'fix:' . $tmp;
=======
        return 'fix:'.$tmp;
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
        return 'fix:' . $tmp;
=======
                return (string) $first;
            }
        }

        return 'fix:'.$tmp;
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
    }

    /**
     * Get translation key for a given key.
     */
    public static function getKeyTrans(string $key): string
    {
        /** @var string */
        $transKey = app(GetTransKeyAction::class)->execute(static::class);

<<<<<<< HEAD
        $key = $transKey . '.' . $key;
<<<<<<< HEAD
=======
<<<<<<< HEAD
        $key = $transKey . '.' . $key;
=======
        $key = $transKey.'.'.$key;
>>>>>>> origin/dev
>>>>>>> origin/dev
        $key = Str::of($key)->replace('.cluster.pages.', '.')->toString();
        return $key;
=======
        $key = Str::of($key)->replace('.cluster.pages.', '.')->toString();
        return $key;
=======
        return $transKey.'.'.$key;
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
    }

    /**
     * Get translation key for a given function name.
     */
    public static function getKeyTransFunc(string $func): string
    {
        $key = Str::of($func)
            ->after('get')
            ->snake()
            ->replace('_', '.')
            ->toString();
        /** @var string */
        $transKey = app(GetTransKeyAction::class)->execute(static::class);

<<<<<<< HEAD
        $key = $transKey . '.' . $key;
<<<<<<< HEAD
=======
<<<<<<< HEAD
        $key = $transKey . '.' . $key;
=======
        $key = $transKey.'.'.$key;
>>>>>>> origin/dev
>>>>>>> origin/dev
        $key = Str::of($key)->replace('.cluster.pages.', '.')->toString();
        return $key;
=======
        $key = Str::of($key)->replace('.cluster.pages.', '.')->toString();
        return $key;
=======
        return $transKey.'.'.$key;
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
    }

    /**
     * Get translation for a given function name.
     */
    public static function transFunc(string $func, bool $exceptionIfNotExist = false): string
    {
        $key = static::getKeyTransFunc($func);
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
        /** @var string|array<int|string,mixed>|null */
        $trans = null;

        try {
            $trans = trans($key);
        } catch (\TypeError $e) {
            dddx([
                'e' => $e,
                'key' => $key,
            ]);
        }

        if ($key === $trans) {
            $group = Str::of($key)->before('.')->toString();
            $item = Str::of($key)->after($group . '.')->toString();
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
        
        /** @var string|array<int|string,mixed>|null $trans */
        try{
            $trans = trans($key);
        }catch(TypeError $e){
            dddx([
                'e'=>$e,
                'key'=>$key
            ]);
        }
=======
=======
        /** @var string|array<int|string,mixed>|null $trans */
        $trans = trans($key);
>>>>>>> 50bb41c (fix: auto resolve conflict)

        if ($key == $trans) {
            $group = Str::of($key)->before('.')->toString();
            $item = Str::of($key)->after($group.'.')->toString();
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
            $group_arr = trans($group);
            if (is_array($group_arr)) {
                $trans = Arr::get($group_arr, $item);
            }
        }
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD

=======
>>>>>>> origin/dev
>>>>>>> origin/dev
=======

=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
        if (is_numeric($trans)) {
            return strval($trans);
        }

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        // if (! is_string($trans) && ! is_numeric($trans) && ! is_array($trans)) {
        //    return 'fix:'.$key;
        // }
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
        if (is_array($trans)) {
            $first = current($trans);
            if (is_string($first) || is_numeric($first)) {
                return is_string($first) ? $first : (string) $first;
            }
        }

<<<<<<< HEAD
<<<<<<< HEAD
        if (is_string($trans)) {
=======
<<<<<<< HEAD
        if (is_string($trans)) {
=======
        if (is_string($trans) /* || is_numeric($trans) */) {
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
        if (is_string($trans)) {
=======
        // if (! is_string($trans) && ! is_numeric($trans) && ! is_array($trans)) {
        //    return 'fix:'.$key;
        // }
        if (is_array($trans)) {
            $first = current($trans);
            if (is_string($first) || is_numeric($first)) {
                return (string) $first;
            }
        }

        if (is_string($trans) /* || is_numeric($trans) */) {
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
            if ($trans === $key) {
                $newTrans = Str::of($key)
                    ->between('::', '.')
                    ->replace('_', ' ')
                    ->toString();
                app(SaveTransAction::class)->execute($key, $newTrans);

                return $newTrans;
            }

            return $trans;
        }

<<<<<<< HEAD
        if ($trans === null) {
=======
<<<<<<< HEAD
<<<<<<< HEAD
        if ($trans === null) {
=======
        if (is_null($trans)) {
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
        if (is_null($trans)) {
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
            $newTrans = Str::of($key)
                ->between('::', '.')
                ->replace('_', ' ')
                ->toString();
            app(SaveTransAction::class)->execute($key, $newTrans);

            return $newTrans;
        }

<<<<<<< HEAD
        return 'fix:' . $key;
=======
<<<<<<< HEAD
<<<<<<< HEAD
        return 'fix:' . $key;
=======
        // $first = current($trans);
        // if (is_string($first) || is_numeric($first)) {
        //    return is_string($first) ? $first : (string) $first;
        // }

        return 'fix:'.$key;
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
        // $first = current($trans);
        // if (is_string($first) || is_numeric($first)) {
        //    return (string) $first;
        // }

        return 'fix:'.$key;
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
    }

    protected function transChoice(string $key, int $number, array $replace = []): string
    {
        return trans_choice($key, $number, $replace) ?? $key;
    }
}
