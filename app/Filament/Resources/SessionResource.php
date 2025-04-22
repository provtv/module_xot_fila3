<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Resources\SessionResource\Pages;
use Modules\Xot\Models\Session;
<<<<<<< HEAD
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

class SessionResource extends XotBaseResource
{
    protected static ?string $model = Session::class;

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
            'id' => TextInput::make('id')
                ->required()
                ->maxLength(255),

            'user_id' => TextInput::make('user_id')
                ->numeric(),

            'ip_address' => TextInput::make('ip_address')
                ->maxLength(45),

            'user_agent' => TextInput::make('user_agent')
                ->maxLength(255),

            'payload' => KeyValue::make('payload')
                ->columnSpanFull(),

            'last_activity' => TextInput::make('last_activity')
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
            TextInput::make('id')
                ->required()
                ->maxLength(255),

            TextInput::make('user_id')
                ->numeric(),

            TextInput::make('ip_address')
                ->maxLength(45),

            TextInput::make('user_agent')
                ->maxLength(255),

            KeyValue::make('payload')
                ->columnSpanFull(),

            TextInput::make('last_activity')
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
                ->required()
                ->numeric(),
        ];
    }

<<<<<<< HEAD
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSessions::route('/'),
            'create' => Pages\CreateSession::route('/create'),
            'edit' => Pages\EditSession::route('/{record}/edit'),
        ];
    }
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
}
