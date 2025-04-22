<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Modules\UI\Filament\Forms\Components\IconPicker;
use Modules\Xot\Filament\Resources\ModuleResource\Pages;
use Modules\Xot\Models\Module;

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)



use Modules\Xot\Filament\Resources\XotBaseResource\RelationManagers\XotBaseRelationManager;





<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
class ModuleResource extends XotBaseResource
{
    protected static ?string $model = Module::class;

    /**
     * @return array<string, Forms\Components\Component>
     */
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')->required(),
            'description' => TextInput::make('description'),
            'icon' => IconPicker::make('icon'),
            'priority' => TextInput::make('priority'),
            'status' => Toggle::make('status'),
        ];
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListModules::route('/'),
            'create' => Pages\CreateModule::route('/create'),
            'edit' => Pages\EditModule::route('/{record}/edit'),
        ];
    }
}
