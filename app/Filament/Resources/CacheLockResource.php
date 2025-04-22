<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Resources\CacheLockResource\Pages;
use Modules\Xot\Models\CacheLock;

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
class CacheLockResource extends XotBaseResource
{
    protected static ?string $model = CacheLock::class;

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    /**
     * Get the form schema for the resource.
     *
     * @return array<string, \Filament\Forms\Components\Component>
     */
    public static function getFormSchema(): array
    {
        return [
            'key' => TextInput::make('key')
                ->required()
                ->maxLength(255),

            'owner' => TextInput::make('owner')
                ->required()
                ->maxLength(255),

            'expiration' => TextInput::make('expiration')
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
    public static function getFormSchema(): array
    {
        return [
            TextInput::make('key')
                ->required()
                ->maxLength(255),

            TextInput::make('owner')
                ->required()
                ->maxLength(255),

            TextInput::make('expiration')
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
                ->required()
                ->numeric(),
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
            'index' => Pages\ListCacheLocks::route('/'),
            'create' => Pages\CreateCacheLock::route('/create'),
            'edit' => Pages\EditCacheLock::route('/{record}/edit'),
        ];
    }
}
