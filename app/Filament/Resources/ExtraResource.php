<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Resources\ExtraResource\Pages;
use Modules\Xot\Models\Extra;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)



use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;





<<<<<<< HEAD
=======
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
class ExtraResource extends XotBaseResource
{
    protected static ?string $model = Extra::class;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
    /**
     * Get the form schema for the resource.
     * 
     * @return array<string, \Filament\Forms\Components\Component>
     */
    public static function getFormSchema(): array
    {
        return [
            'id' => TextInput::make('id')
                ->required()
                ->maxLength(36),

            'post_type' => TextInput::make('post_type')
                ->required()
                ->maxLength(255),

            'post_id' => TextInput::make('post_id')
                ->required()
                ->numeric(),

            'value' => KeyValue::make('value')
<<<<<<< HEAD
=======
=======
    public static function getFormSchema(): array
    {
        return [
            TextInput::make('id')
                ->required()
                ->maxLength(36),

            TextInput::make('post_type')
                ->required()
                ->maxLength(255),

            TextInput::make('post_id')
                ->required()
                ->numeric(),

            KeyValue::make('value')
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
                ->keyLabel('Chiave')
                ->valueLabel('Valore')
                ->reorderable()
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
            'index' => Pages\ListExtras::route('/'),
            'create' => Pages\CreateExtra::route('/create'),
            'edit' => Pages\EditExtra::route('/{record}/edit'),
        ];
    }
}
