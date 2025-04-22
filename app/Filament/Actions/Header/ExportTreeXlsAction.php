<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Xot\Filament\Actions\Header;

// Header actions must be an instance of Filament\Actions\Action, or Filament\Actions\ActionGroup.
// use Filament\Tables\Actions\Action;
use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Export\ExportXlsByCollection;
use Modules\Xot\Actions\GetTransKeyAction;
use Modules\Xot\Contracts\HasRecursiveRelationshipsContract;
use Webmozart\Assert\Assert;

/**
 * Undocumented class.
 *
 * @property Model $record
 */
class ExportTreeXlsAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()

<<<<<<< HEAD
<<<<<<< HEAD
            
=======
<<<<<<< HEAD
            
=======
            ->label('')
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======

>>>>>>> 4ab3760 (.)
            ->tooltip(__('xot::actions.export_xls'))

            // ->icon('heroicon-o-cloud-arrow-down')
            // ->icon('fas-file-excel')
            ->icon('heroicon-o-arrow-down-tray')
            ->action(static function (\Filament\Resources\Pages\Page $livewire, Model $record, $data) {
                $tableFilters = [
                    'id' => $record->getKey(),
                ];
                $filename = class_basename($livewire).'-'.collect($tableFilters)->flatten()->implode('-').'.xlsx';
                $transKey = app(GetTransKeyAction::class)->execute($livewire::class);
                $transKey .= '.fields';
                // $query = $livewire->getFilteredTableQuery(); // ->getQuery(); // Staudenmeir\LaravelCte\Query\Builder
                // $rows = $query->get();
                Assert::implementsInterface($record, HasRecursiveRelationshipsContract::class);
                $rows = $record->descendantsAndSelf;
                Assert::isInstanceOf($rows, \Illuminate\Database\Eloquent\Collection::class);
                $resource = $livewire->getResource();
                $fields = [];
                if (method_exists($resource, 'getXlsFields')) {
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
                    $fields = $resource::getXlsFields($tableFilters);
                    // Convertiamo tutti i valori a stringhe
                    $fields = array_map(fn ($field) => is_string($field) ? $field : (string) $field, (array) $fields);
                    Assert::isArray($fields);
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
                    Assert::isArray($fields = $resource::getXlsFields($tableFilters));
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
                }

                return app(ExportXlsByCollection::class)->execute($rows, $filename, $transKey, $fields);
            });
    }

    public static function getDefaultName(): ?string
    {
        return 'export_tree_xls';
    }
}
