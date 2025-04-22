<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources;

use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource as FilamentResource;
use Illuminate\Support\Str;
use Modules\Xot\Actions\ModelClass\CountAction;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
use Webmozart\Assert\Assert;

use function Safe\glob;

/**
 * @method static string getUrl(string $name, array<string, mixed> $parameters = [], bool $isAbsolute = true)
 */
<<<<<<< HEAD
=======
=======

use function Safe\glob;

use Webmozart\Assert\Assert;

>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
abstract class XotBaseResource extends FilamentResource
{
    use NavigationLabelTrait;

    protected static ?string $model = null;

    // protected static ?string $navigationIcon = 'heroicon-o-bell';
    // protected static ?string $navigationLabel = 'Custom Navigation Label';
    // protected static ?string $activeNavigationIcon = 'heroicon-s-document-text';
    // protected static bool $shouldRegisterNavigation = false;
    // protected static ?string $navigationGroup = 'Parametri di Sistema';
    // protected static ?int $navigationSort = null;

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function getModuleName(): string
    {
        return Str::between(static::class, 'Modules\\', '\Filament');
    }

    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return true;
    }

    /**
     * @return class-string<\Illuminate\Database\Eloquent\Model>
     */
    public static function getModel(): string
    {
        // if (null != static::$model) {
        //    return static::$model;
        // }
        $moduleName = static::getModuleName();
        $modelName = Str::before(class_basename(static::class), 'Resource');
        $res = 'Modules\\'.$moduleName.'\Models\\'.$modelName;
        Assert::classExists($res, sprintf('Model class %s does not exist', $res));
        Assert::subclassOf($res, \Illuminate\Database\Eloquent\Model::class, sprintf('Class %s must extend Eloquent Model', $res));
        static::$model = $res;

        return $res;
    }

    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
     * @return array<string|int,\Filament\Forms\Components\Component>
     */
    abstract public static function getFormSchema(): array;

    final public static function form(Form $form): Form
<<<<<<< HEAD
=======
=======
     * per rendere obbligatorio questo metodo.
     */
    abstract public static function getFormSchema(): array;

    public static function form(Form $form): Form
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
    {
        return $form
            ->schema(static::getFormSchema());
    }

    /**
     * @return array<string, mixed>
     */
    public static function extendTableCallback(): array
    {
        return [
        ];
    }

    public static function extendFormCallback(): array
    {
        return [
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        try {
            $count = app(CountAction::class)->execute(static::getModel());

            return number_format($count, 0).'';
        } catch (\Exception $e) {
            return '--';
        }
    }

<<<<<<< HEAD
    /**
     * @return array<string, \Filament\Resources\Pages\PageRegistration>
     */
=======
<<<<<<< HEAD
    /**
     * @return array<string, \Filament\Resources\Pages\PageRegistration>
     */
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
    public static function getPages(): array
    {
        $prefix = static::class.'\Pages\\';
        $name = Str::of(class_basename(static::class))->before('Resource')->toString();
        $plural = Str::of($name)->plural()->toString();
        $index = Str::of($prefix)->append('List'.$plural)->toString();
        $create = Str::of($prefix)->append('Create'.$name.'')->toString();
        $edit = Str::of($prefix)->append('Edit'.$name.'')->toString();
        $view = Str::of($prefix)->append('View'.$name.'')->toString();

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
        /** @var class-string<\Filament\Resources\Pages\Page> $index */
        $index = $index;
        /** @var class-string<\Filament\Resources\Pages\Page> $create */
        $create = $create;
        /** @var class-string<\Filament\Resources\Pages\Page> $edit */
        $edit = $edit;
        /** @var class-string<\Filament\Resources\Pages\Page> $view */
        $view = $view;
        
        /** @var array<string, \Filament\Resources\Pages\PageRegistration> $pages */
<<<<<<< HEAD
=======
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
        $pages = [
            'index' => $index::route('/'),
            'create' => $create::route('/create'),
            'edit' => $edit::route('/{record}/edit'),
            // 'view' => $view::route('/{record}'),
        ];

        if (class_exists($view)) {
            $pages['view'] = $view::route('/{record}');
        }

        return $pages;
    }

<<<<<<< HEAD
    /**
     * @return array<class-string<\Filament\Resources\RelationManagers\RelationManager>|\Filament\Resources\RelationManagers\RelationGroup|\Filament\Resources\RelationManagers\RelationManagerConfiguration>
     */
=======
<<<<<<< HEAD
    /**
     * @return array<class-string<\Filament\Resources\RelationManagers\RelationManager>|\Filament\Resources\RelationManagers\RelationGroup|\Filament\Resources\RelationManagers\RelationManagerConfiguration>
     */
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
    public static function getRelations(): array
    {
        $reflector = new \ReflectionClass(static::class);
        $filename = $reflector->getFileName();
<<<<<<< HEAD
        Assert::string($filename);
        
=======
<<<<<<< HEAD
        Assert::string($filename);
        
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
        $path = Str::of($filename)
            ->before('.php')
            ->append(DIRECTORY_SEPARATOR)
            ->append('RelationManagers')
            ->toString();

        $files = glob($path.DIRECTORY_SEPARATOR.'*RelationManager.php');
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
        Assert::isArray($files);
        
        /** @var array<class-string<\Filament\Resources\RelationManagers\RelationManager>> $res */
        $res = [];
        foreach ($files as $file) {
            $className = Str::of($file)
                ->after('RelationManagers'.DIRECTORY_SEPARATOR)
                ->before('.php')
                ->prepend(static::class.'\RelationManagers\\')
                ->toString();
            
            if (class_exists($className)) {
                Assert::subclassOf($className, \Filament\Resources\RelationManagers\RelationManager::class);
                $res[] = $className;
            }
<<<<<<< HEAD
=======
=======
        $res = [];
        foreach ($files as $file) {
            $info = pathinfo($file);
            $res[] = static::class.'\RelationManagers\\'.$info['filename'];
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
        }

        return $res;
    }
}
