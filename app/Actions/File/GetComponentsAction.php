<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\File;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Modules\Xot\Datas\ComponentFileData;
<<<<<<< HEAD
<<<<<<< HEAD

use function Safe\json_decode;

=======
<<<<<<< HEAD
=======

use function Safe\json_decode;

>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
use Spatie\LaravelData\DataCollection;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetComponentsAction
{
    use QueueableAction;

    /**
     * Undocumented function.
     *
     * @return DataCollection<ComponentFileData>
     */
    public function execute(string $path, string $namespace, string $prefix, bool $force_recreate = false): DataCollection
    {
        Assert::string($namespace = Str::replace('/', '\\', $namespace), '['.__LINE__.']['.class_basename(static::class).']');
        $components_json = $path.'/_components.json';
        $components_json = app(FixPathAction::class)->execute($components_json);

        $path = app(FixPathAction::class)->execute($path);

        if (! File::exists($path)) {
            if (Str::startsWith($path, base_path('Modules'))) {
                File::makeDirectory($path, 0755, true, true);
            }
        }
<<<<<<< HEAD
<<<<<<< HEAD

        $exists = File::exists($components_json);
        if ($exists && ! $force_recreate) {
            Assert::string($content = File::get($components_json), '['.__LINE__.']['.class_basename(static::class).']');
            $comps = json_decode($content, false);
=======
<<<<<<< HEAD
=======
>>>>>>> 4ab3760 (.)
        //$force_recreate = true;
        $exists = File::exists($components_json);
        if ($exists && ! $force_recreate) {
            Assert::string($content = File::get($components_json), '['.__LINE__.']['.class_basename(static::class).']');
            try {
                $comps = json_decode($content, true, 512, JSON_THROW_ON_ERROR);
            } catch (\JsonException $e) {
                $comps = [];
            }

>>>>>>> 50bb41c (fix: auto resolve conflict)
            if (! is_array($comps)) {
                $comps = [];
            }
            return ComponentFileData::collection($comps);
        }

        $files = File::allFiles($path);
        $comps = [];
<<<<<<< HEAD
        
=======

<<<<<<< HEAD
=======

        $exists = File::exists($components_json);
        // $force_recreate = true;
        if ($exists && ! $force_recreate) {
            Assert::string($content = File::get($components_json), '['.__LINE__.']['.class_basename(static::class).']');

            // return (array) json_decode((string) $content, null, 512, JSON_THROW_ON_ERROR);
            // return (array) json_decode($content, false, 512, JSON_THROW_ON_ERROR);
            $comps = json_decode($content, false);
            if (! is_array($comps)) {
                $comps = [];
            }
            $res = ComponentFileData::collection($comps);

            return $res;
        }

        $files = File::allFiles($path);

        $comps = [];
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        foreach ($files as $file) {
            if ('php' !== $file->getExtension()) {
                continue;
            }
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)

            $class_name = $file->getFilenameWithoutExtension();
            $relative_path = $file->getRelativePath();
            Assert::string($relative_path = Str::replace('/', '\\', $relative_path), '['.__LINE__.']['.class_basename(static::class).']');

            $comp_name = Str::slug(Str::snake(Str::replace('\\', ' ', $class_name)));
            $comp_name = $prefix . $comp_name;
            $comp_ns = $namespace . '\\' . $class_name;

            if ('' !== $relative_path) {
                $comp_name = '';
                $piece = collect(explode('\\', $relative_path))
                    ->map(fn ($item) => Str::slug(Str::snake($item)))
                    ->implode('.');
<<<<<<< HEAD
                
=======

>>>>>>> 50bb41c (fix: auto resolve conflict)
                $comp_name = $prefix . $piece . '.' . Str::slug(Str::snake(Str::replace('\\', ' ', $class_name)));
                $comp_ns = $namespace . '\\' . $relative_path . '\\' . $class_name;
                $class_name = $relative_path . '\\' . $class_name;
            }

            try {
                if (!class_exists($comp_ns)) {
                    throw new \Exception("La classe {$comp_ns} non esiste");
                }
<<<<<<< HEAD
                
=======

>>>>>>> 50bb41c (fix: auto resolve conflict)
                /** @var class-string<object> $comp_ns */
                $reflection = new \ReflectionClass($comp_ns);
                if ($reflection->isAbstract()) {
                    continue;
                }

                $comps[] = ComponentFileData::from([
                    'name' => $comp_name,
                    'class' => $class_name,
                    'ns' => $comp_ns,
                ])->toArray();

            } catch (\Exception $e) {
                dddx([
                    'comp_name' => $comp_name,
                    'class_name' => $class_name,
                    'comp_ns' => $comp_ns,
                    'path' => $path,
                    'namespace' => $namespace,
                    'prefix' => $prefix,
                    'message' => $e->getMessage(),
                ]);
            }
        }

<<<<<<< HEAD
        $content = \Safe\json_encode($comps, JSON_THROW_ON_ERROR);
        $old_content = File::exists($components_json) ? File::get($components_json) : '';
=======
        try {
            $content = json_encode($comps, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);
        } catch (\JsonException $e) {
            return ComponentFileData::collection($comps);
        }

        $old_content = File::exists($components_json) ? File::get($components_json) : '';
<<<<<<< HEAD
=======
            $tmp = (object) [];
            $class_name = $file->getFilenameWithoutExtension();

            $tmp->class_name = $class_name;
            Assert::string($comp_name = Str::replace('\\', ' ', $class_name), '['.__LINE__.']['.class_basename(static::class).']');
            $tmp->comp_name = Str::slug(Str::snake($comp_name));
            $tmp->comp_name = $prefix.$tmp->comp_name;

            $tmp->comp_ns = $namespace.'\\'.$class_name;
            $relative_path = $file->getRelativePath();
            Assert::string($relative_path = Str::replace('/', '\\', $relative_path), '['.__LINE__.']['.class_basename(static::class).']');

            if ('' !== $relative_path) {
                $tmp->comp_name = '';
                $piece = collect(explode('\\', $relative_path))
                    ->map(
                        static fn ($item) => Str::slug(Str::snake($item))
                    )
                    ->implode('.');
                $tmp->comp_name .= $piece;
                Assert::string($comp_name = Str::replace('\\', ' ', $class_name), '['.__LINE__.']['.class_basename(static::class).']');

                $tmp->comp_name .= '.'.Str::slug(Str::snake($comp_name));
                $tmp->comp_name = $prefix.$tmp->comp_name;
                $tmp->comp_ns = $namespace.'\\'.$relative_path.'\\'.$class_name;
                $tmp->class_name = $relative_path.'\\'.$tmp->class_name;
            }
            try {
                $reflection = new \ReflectionClass($tmp->comp_ns);
                if ($reflection->isAbstract()) {
                    continue;
                }
            } catch (\Exception $e) {
                dddx([
                    'tmp' => $tmp,
                    'path' => $path,
                    'namespace' => $namespace,
                    'prefix' => $prefix,
                    'e' => $e->getMessage(),
                ]);
            }

            $tmp = ComponentFileData::from([
                'name' => $tmp->comp_name,
                'class' => $tmp->class_name,

                // 'path'=>$path.DIRECTORY_SEPARATOR.$relative_path,
                'ns' => $tmp->comp_ns,
            ])->toArray();

            $comps[] = $tmp;
        }

        $content = json_encode($comps, JSON_THROW_ON_ERROR);

        $old_content = '';
        if (File::exists($components_json)) {
            $old_content = File::get($components_json);
        }
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)

        if ($old_content !== $content) {
            File::put($components_json, $content);
        }

        return ComponentFileData::collection($comps);
<<<<<<< HEAD
=======
<<<<<<< HEAD
        return ComponentFileData::collection($comps);
=======
        $res = ComponentFileData::collection($comps);

        return $res;
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    }
}
