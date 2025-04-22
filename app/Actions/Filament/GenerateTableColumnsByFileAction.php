<?php

/**
 * -WIP.
 */

declare(strict_types=1);

namespace Modules\Xot\Actions\Filament;

use Filament\Forms\Commands\Concerns\CanGenerateForms;
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
use Filament\Resources\Resource;
use Filament\Support\Commands\Concerns\CanReadModelSchemas;
use Filament\Tables\Commands\Concerns\CanGenerateTables;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
use Filament\Support\Commands\Concerns\CanReadModelSchemas;
use Filament\Tables\Commands\Concerns\CanGenerateTables;
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
use Illuminate\Support\Facades\File as LaravelFile;
use Illuminate\Support\Str;
use Modules\Xot\Actions\ModelClass\GetMethodBodyAction;
use Modules\Xot\Actions\String\GetStrBetweenStartsWithAction;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\Finder\SplFileInfo as File;
use Webmozart\Assert\Assert;

class GenerateTableColumnsByFileAction
{
    use CanGenerateForms;

    // use CanGenerateImporterColumns;
    use CanGenerateTables;
    use CanReadModelSchemas;
    use QueueableAction;

    /**
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
     * Genera colonne per tabelle e form Filament basate su un file di risorsa.
     *
     * @param File $file Il file della risorsa Filament
     * 
     * @return void
     */
    public function execute(File $file): void
<<<<<<< HEAD
=======
=======
     * Undocumented function.
     *
     * @return void
     */
    public function execute(File $file)
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
     * Genera colonne per tabelle e form Filament basate su un file di risorsa.
     *
     * @param File $file Il file della risorsa Filament
     *
     * @return void
     */
    public function execute(File $file): void
>>>>>>> 4ab3760 (.)
    {
        if (! $file->isFile()) {
            return;
        }
        if (! \in_array($file->getExtension(), ['php'], false)) {
            return;
        }
        $filename = $file->getPathname();
        $class_name = Str::replace(base_path('Modules/'), 'Modules/', $filename);
        Assert::string($class_name = Str::replace('/', '\\', $class_name), '['.__LINE__.']['.class_basename($this).']');
        $class_name = Str::substr($class_name, 0, -4);
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)

        // Verifichiamo che la classe esista
        Assert::classExists($class_name);

        /** @var Resource $resourceInstance */
        $resourceInstance = app($class_name);

        // Verifichiamo che il metodo getModel esista
        if (!method_exists($resourceInstance, 'getModel')) {
            return;
        }

        /** @var string $modelClass */
        $modelClass = $resourceInstance->getModel();

        // Verifichiamo che la classe del modello esista
        Assert::classExists($modelClass);

        /** @var Model $modelInstance */
        $modelInstance = app($modelClass);

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
        $model_name = app($class_name)->getModel();
        $model = app($model_name);
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        // ------------------- TABLE -------------------
        // *
        $body = app(GetMethodBodyAction::class)->execute($class_name, 'table');
        $body1 = app(GetStrBetweenStartsWithAction::class)->execute($body, '->columns(', '(', ')');
        $body_new = '->columns(['.chr(13).$this->getResourceTableColumns($modelClass).chr(13).'])';
<<<<<<< HEAD
=======
<<<<<<< HEAD
        $body_new = '->columns(['.chr(13).$this->getResourceTableColumns($modelClass).chr(13).'])';
=======
        $body_new = '->columns(['.chr(13).$this->getResourceTableColumns($model_name).chr(13).'])';
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        $body_up = Str::of($body)
            ->replace($body1, $body_new)
            ->toString();
        $content_new = Str::of($file->getContents())->replace($body, $body_up)->toString();
        LaravelFile::put($filename, $content_new);
        // -------------------- FORM ------------------------------
        $body = app(GetMethodBodyAction::class)->execute($class_name, 'form');
        $body1 = app(GetStrBetweenStartsWithAction::class)->execute($body, '->schema(', '(', ')');
        $body_new = '->schema(['.chr(13).$this->getResourceFormSchema($modelClass).chr(13).'])';
<<<<<<< HEAD
=======
<<<<<<< HEAD
        $body_new = '->schema(['.chr(13).$this->getResourceFormSchema($modelClass).chr(13).'])';
=======
        $body_new = '->schema(['.chr(13).$this->getResourceFormSchema($model_name).chr(13).'])';
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        $body_up = Str::of($body)
            ->replace($body1, $body_new)
            ->toString();
        $content_new = Str::of($file->getContents())->replace($body, $body_up)->toString();
        LaravelFile::put($filename, $content_new);
        // -----------------------------------------------------

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        // Verifichiamo che il metodo getFillable esista
        if (method_exists($modelInstance, 'getFillable')) {
            $fillable = $modelInstance->getFillable();

            // Verifichiamo che $fillable sia un array e contenga 'anno'
            if (is_array($fillable) && in_array('anno', $fillable)) {
                $body = app(GetMethodBodyAction::class)->execute($class_name, 'table');
                $body1 = app(GetStrBetweenStartsWithAction::class)->execute($body, '->filters(', '(', ')');
                $body_new = "->filters([
                        app(\Modules\Xot\Actions\Filament\Filter\GetYearFilter::class)->execute('anno',intval(date('Y')) - 3,intval(date('Y'))),
                    ],layout: \Filament\Tables\Enums\FiltersLayout::AboveContent)
                    ->persistFiltersInSession()";
                $body_up = Str::of($body)
                    ->replace($body1, $body_new)
                    ->toString();
                $content_new = Str::of($file->getContents())->replace($body, $body_up)->toString();
                LaravelFile::put($filename, $content_new);
            }
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
        if (in_array('anno', $model->getFillable())) {
            $body = app(GetMethodBodyAction::class)->execute($class_name, 'table');
            $body1 = app(GetStrBetweenStartsWithAction::class)->execute($body, '->filters(', '(', ')');
            $body_new = "->filters([
                    app(\Modules\Xot\Actions\Filament\Filter\GetYearFilter::class)->execute('anno',intval(date('Y')) - 3,intval(date('Y'))),
                ],layout: \Filament\Tables\Enums\FiltersLayout::AboveContent)
                ->persistFiltersInSession()";
            $body_up = Str::of($body)
                ->replace($body1, $body_new)
                ->toString();
            $content_new = Str::of($file->getContents())->replace($body, $body_up)->toString();
            LaravelFile::put($filename, $content_new);
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        }
        // */
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    /**
     * Mostra informazioni di debug su un file.
     *
     * @param File $file Il file da analizzare
     *
     * @return void
     */
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
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
            'getPathname' => $file->getPathname(), // "/var/www/html/ptvx/laravel/Modules/Progressioni/Filament/resources/AssenzeResource.php
            'isFile' => $file->isFile(), // true
            'getRealPath' => $file->getRealPath(), // /var/www/html/ptvx/laravel/Modules/Progressioni/Filament/resources/AssenzeResource.php
            // 'getFileInfo' => $file->getFileInfo(),
            // 'getPathInfo' => $file->getPathInfo(),
            'methods' => get_class_methods($file),
        ]);
    }
}
