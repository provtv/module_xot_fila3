<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources;

use Modules\Xot\Models\Cache;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Filament\Resources\CacheResource\Pages;
<<<<<<< HEAD
use Modules\Xot\Models\Cache;
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;
=======
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManagers\XotBaseRelationManager;
>>>>>>> 4ab3760 (.)

class CacheResource extends XotBaseResource
{
    protected static ?string $model = Cache::class;

    public static function getFormSchema(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            'key' => TextInput::make('key')
                ->required()
                ->maxLength(255),

            'expiration' => TextInput::make('expiration')
                ->required()
                ->numeric(),

            'value' => KeyValue::make('value')
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
            TextInput::make('key')
                ->required()
                ->maxLength(255),

            TextInput::make('expiration')
                ->required()
                ->numeric(),

            KeyValue::make('value')
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
                ->columnSpanFull(),
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
            'index' => Pages\ListCaches::route('/'),
            'create' => Pages\CreateCache::route('/create'),
            'edit' => Pages\EditCache::route('/{record}/edit'),
        ];
    }
}
