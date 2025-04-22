<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\XotBaseResource\RelationManager;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Filament\Traits\HasXotTable;
use Webmozart\Assert\Assert;

/**
 * @property class-string<\Modules\Xot\Filament\Resources\XotBaseResource> $resource
<<<<<<< HEAD
=======
<<<<<<< HEAD
 * @property class-string<\Modules\Xot\Filament\Resources\XotBaseResource> $resource
=======
 * @property class-string<Model> $resource
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
 */
abstract class XotBaseRelationManager extends RelationManager
{
    use HasXotTable;

    protected static string $relationship = '';

    /**
     * @var class-string<\Modules\Xot\Filament\Resources\XotBaseResource>
     */
<<<<<<< HEAD
=======
<<<<<<< HEAD
    /**
     * @var class-string<\Modules\Xot\Filament\Resources\XotBaseResource>
     */
=======
    /** @var class-string<XotBaseResource> */
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    protected static string $resource;

    public static function getModuleName(): string
    {
        return Str::between(static::class, 'Modules\\', '\Filament');
    }

    public static function getNavigationLabel(): string
    {
        return static::transFunc(__FUNCTION__);
    }

    public static function getNavigationGroup(): string
    {
        return static::transFunc(__FUNCTION__);
    }

    protected static function getPluralModelLabel(): string
    {
        return static::transFunc(__FUNCTION__);
    }

    final public function form(Form $form): Form
<<<<<<< HEAD
=======
<<<<<<< HEAD
    final public function form(Form $form): Form
=======
    public function form(Form $form): Form
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    {
        return $form
            ->schema($this->getFormSchema());
    }

    /**
     * Get form schema.
     *
     * @return array<string|int, \Filament\Forms\Components\Component>
<<<<<<< HEAD
=======
<<<<<<< HEAD
     * @return array<string|int, \Filament\Forms\Components\Component>
=======
     * @return array<string, \Filament\Forms\Components\Component>
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
     */
    public function getFormSchema(): array
    {
        return $this->getResource()::getFormSchema();
    }

    public function getListTableColumns(): array
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        $pages = $this->getResource()::getPages();
        if (!is_array($pages) || !isset($pages['index'])) {
            return [];
        }

        $index = $pages['index'];
        if (!is_object($index) || !method_exists($index, 'getPage')) {
            return [];
        }

        $index_page = $index->getPage();
        if (!is_string($index_page) || !class_exists($index_page)) {
            return [];
        }

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
        $index = Arr::get($this->getResource()::getPages(), 'index');
        $index_page = $index->getPage();
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        $columns = app($index_page)->getListTableColumns();

        return $columns;
    }

    // public function table(Table $table): Table
    // {

    //     /** @var class-string<Model> $resource */
    //     $resource = $this->getResource();
    //     Assert::classExists($resource);

    //     if (method_exists($resource, 'getListTableColumns')) {
    //         /** @var array<string, Tables\Columns\Column> $columns */
    //         $columns = $resource::getListTableColumns();

    //         return $table->columns($columns);
    //     }

    //     return $table->columns($this->getTableColumns());
    // }

    // /**
    //  * Get table columns.
    //  *
    //  * @return array<string, Tables\Columns\Column>
    //  */
    // protected function getTableColumns(): array
    // {
    //     return [];
    // }

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)

    /**
     * Get the resource class.
     *
     * @return class-string<\Modules\Xot\Filament\Resources\XotBaseResource>
     */
    protected function getResource(): string
    {
        // Get the resource class via parent method first
        try {
            // @phpstan-ignore-next-line
            $parentResource = parent::getResource();
            if (is_subclass_of($parentResource, \Modules\Xot\Filament\Resources\XotBaseResource::class)) {
                /** @var class-string<\Modules\Xot\Filament\Resources\XotBaseResource> $parentResource */
                return $parentResource;
            }
        } catch (\Exception $e) {
            // Fallback if parent method fails
        }

        // Fallback: derive the resource class name from the relation manager name
        $class = get_class($this);
        $resource_name = Str::of(class_basename($this))
            ->beforeLast('RelationManager')
            ->singular()
            ->append('Resource')
            ->toString();
        $ns = Str::of($class)
            ->before('Resources\\')
            ->append('Resources\\')
            ->toString();
        $resourceClass = $ns.'\\'.$resource_name;

        if (!class_exists($resourceClass)) {
            throw new \Exception("Cannot find resource class {$resourceClass}");
        }

        if (!is_subclass_of($resourceClass, \Modules\Xot\Filament\Resources\XotBaseResource::class)) {
            throw new \Exception("{$resourceClass} must extend XotBaseResource");
        }

        return $resourceClass;
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
    /**
     * Get the resource class.
     *
     * @return class-string<XotBaseResource>
     */
    protected function getResource(): string
    {
        try {
            /* @var class-string<XotBaseResource> */
            return static::$resource;
        } catch (\Exception $e) {
            dddx($e->getMessage());
            $class = $this::class;
            $resource_name = Str::of(class_basename($this))
                ->beforeLast('RelationManager')
                ->singular()
                ->append('Resource')
                ->toString();
            $ns = Str::of($class)
                ->before('Resources\\')
                ->append('Resources\\')
                ->toString();
            Assert::classExists($resource_class = $ns.''.$resource_name);

            return $resource_class;
        }
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    }
}
