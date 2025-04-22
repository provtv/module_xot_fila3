<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\CacheLockResource\Pages;

use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\CacheLockResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

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
class ListCacheLocks extends XotBaseListRecords
{
    protected static string $resource = CacheLockResource::class;

    public function getListTableColumns(): array
    {
        return [
            'key' => TextColumn::make('key')
                ->searchable()
                ->sortable()
                ->wrap(),
            'owner' => TextColumn::make('owner')
                ->searchable()
                ->sortable()
                ->wrap(),
            'expiration' => TextColumn::make('expiration')
                ->numeric()
                ->sortable(),
        ];
    }
}
