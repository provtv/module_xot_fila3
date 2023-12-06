<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Filament;

use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\Finder\SplFileInfo as File;

class GenerateFormByFileAction
{
    use QueueableAction;

    /**
     * Undocumented function.
     * return number of input added.
     */
    public function execute(File $file): int
    {
        if (! $file->isFile()) {
            return 0;
        }
        if (! in_array($file->getExtension(), ['php'])) {
            return 0;
        }

        $class_name = Str::replace(base_path('Modules/'), 'Modules/', $file->getPathname());
        $class_name = Str::replace('/', '\\', $class_name);
        $class_name = Str::substr($class_name, 0, -4);
        $model_name = app($class_name)->getModel();
        $fillable = app($model_name)->getFillable();

        $reflection_class = new \ReflectionClass($class_name);
        $form_method = $reflection_class->getMethod('form');

        $start_line = $form_method->getStartLine() - 1; // it's actually - 1, otherwise you wont get the function() block
        $end_line = $form_method->getEndLine();
        $length = $end_line - $start_line;

        // $contents= $file->getContents();
        $source = file($form_method->getFileName());
        $body = implode('', array_slice($source, $start_line, $length));

        dd([
            'class_name' => $class_name,
            'model_name' => $model_name,
            'fillable' => $fillable,
            // 't1'=>app($class_name)->form(app(\Filament\Forms\Form::class)),
            'methods' => get_class_methods(app($class_name)),
            'form_method' => $form_method,
            'form_method_methods' => get_class_methods($form_method),
            'body' => $body,
        ]);
    }

    public function ddFile(File $file): void
    {
        dd([
            'getRelativePath' => $file->getRelativePath(), // =  ""
            'getRelativePathname' => $file->getRelativePathname(), //  AssenzeResource.php
            'getFilenameWithoutExtension' => $file->getFilenameWithoutExtension(), // AssenzeResource
            // 'getContents' => $file->getContents(),
            'getPath' => $file->getPath(), // = /var/www/html/ptvx/laravel/Modules/Progressioni/Filament/Resources
            'getFilename' => $file->getFilename(), // = AssenzeResource.php
            'getExtension' => $file->getExtension(), // php
            'getBasename' => $file->getBasename(), // AssenzeResource.php
            'getPathname' => $file->getPathname(), // "/var/www/html/ptvx/laravel/Modules/Progressioni/Filament/Resources/AssenzeResource.php
            'isFile' => $file->isFile(), // true
            'getRealPath' => $file->getRealPath(), // /var/www/html/ptvx/laravel/Modules/Progressioni/Filament/Resources/AssenzeResource.php
            // 'getFileInfo' => $file->getFileInfo(),
            // 'getPathInfo' => $file->getPathInfo(),
            'methods' => get_class_methods($file),
        ]);
    }
}