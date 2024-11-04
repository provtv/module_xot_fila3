<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Traits;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Tables;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\UI\Filament\Actions\Table\TableLayoutToggleTableAction;

/**
 * Trait HasXotTable.
 *
 * Provides enhanced table functionality with translations and optimized structure.
 *
 * @property TableLayoutEnum $layoutView
 */
trait HasXotTable
{
    /**
     * Get header actions for the table, including custom action for table layout toggle.
     *
     * @return array<Tables\Actions\Action>
     */
    protected function getTableHeaderActions(): array
    {
        $actions = [
            TableLayoutToggleTableAction::make(),
        ];

        // Conditionally add actions based on availability of relationships
        if ($this->shouldShowAssociateAction()) {
            $actions[] = Tables\Actions\AssociateAction::make()
                ->label('')
                ->icon('heroicon-o-paper-clip')
                ->tooltip(__('user::actions.associate_user'));
        }

        if ($this->shouldShowAttachAction()) {
            $actions[] = Tables\Actions\AttachAction::make()
                ->label('')
                ->icon('heroicon-o-link')
                ->tooltip(__('user::actions.attach_user'));
        }

        return $actions;
    }

    /**
     * Determine whether to display the AssociateAction.
     */
    protected function shouldShowAssociateAction(): bool
    {
        // Custom logic for showing AssociateAction
        return false; // Change this to your condition
    }

    /**
     * Determine whether to display the AttachAction.
     */
    protected function shouldShowAttachAction(): bool
    {
        return method_exists($this, 'getRelationship'); // Ensure relationship method exists
    }

    /**
     * Determine whether to display the DetachAction.
     */
    protected function shouldShowDetachAction(): bool
    {
        // Show DetachAction only if an associated relationship exists
        return method_exists($this, 'getRelationship') && $this->getRelationship()->exists();
    }

    /**
     * Get global header actions, optimized with tooltips instead of labels.
     *
     * @return array<Actions\Action>
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('')
                ->tooltip(__('user::actions.create_user'))
                ->icon('heroicon-o-plus'),
        ];
    }

    /**
     * Get table columns for grid layout.
     */
    public function getGridTableColumns(): array
    {
        return [
            Stack::make($this->getListTableColumns()),
        ];
    }

    /**
     * Define the main table structure.
     */
    public function table(Table $table): Table
    {
        if (! $this->tableExists()) {
            $this->notifyTableMissing();

            return $this->configureEmptyTable($table);
        }

        return $table
            ->columns($this->layoutView->getTableColumns())
            ->contentGrid($this->layoutView->getTableContentGrid())
            ->headerActions($this->getTableHeaderActions())
            ->filters($this->getTableFilters())
            ->filtersLayout(FiltersLayout::AboveContent)
            ->filtersFormColumns(3)
            ->persistFiltersInSession()
            ->actions($this->getTableActions())
            ->bulkActions($this->getTableBulkActions())
            ->actionsPosition(ActionsPosition::BeforeColumns)
            ->striped();
    }

    /**
     * Define table filters.
     *
     * @return array<Tables\Filters\Filter>
     */
    protected function getTableFilters(): array
    {
        return []; // Implement any specific filters needed
    }

    /**
     * Define row-level actions with translations.
     *
     * @return array<Tables\Actions\Action>
     */
    protected function getTableActions(): array
    {
        $actions = [
            Tables\Actions\ViewAction::make()
                ->label('')
                ->tooltip(__('user::actions.view'))
            // ->icon('heroicon-o-eye')
            // ->color('info')
            ,

            Tables\Actions\EditAction::make()
                ->label('')
                ->tooltip(__('user::actions.edit'))
                ->icon('heroicon-o-pencil')
                ->color('warning'),
        ];

        if ($this->shouldShowDetachAction()) {
            $actions[] = Tables\Actions\DetachAction::make()
                ->label('')
                ->tooltip(__('user::actions.detach'))
                ->icon('heroicon-o-link-slash')
                ->color('danger')
                ->requiresConfirmation();
        }

        return $actions;
    }

    /**
     * Define bulk actions with translations.
     *
     * @return array<Tables\Actions\BulkAction>
     */
    protected function getTableBulkActions(): array
    {
        return [
            DeleteBulkAction::make()
                ->label('')
                ->tooltip(__('user::actions.delete_selected'))
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->requiresConfirmation(),
        ];
    }

    /**
     * Get the model class from the relationship or throw an exception if not found.
     *
     * @throws \Exception
     */
    public function getModelClass(): string
    {
        if (method_exists($this, 'getRelationship')) {
            return $this->getRelationship()->getModel()::class;
        }
        if (method_exists($this, 'getModel')) {
            return $this->getModel();
        }
        throw new \Exception('No model found in '.class_basename(__CLASS__).'::'.__FUNCTION__);
    }

    /**
     * Check if the model's table exists in the database.
     */
    protected function tableExists(): bool
    {
        $model = $this->getModelClass();

        return app($model)->getConnection()->getSchemaBuilder()->hasTable(app($model)->getTable());
    }

    /**
     * Notify the user if the table is missing.
     */
    protected function notifyTableMissing(): void
    {
        $model = $this->getModelClass();
        $tableName = app($model)->getTable();
        Notification::make()
            ->title(__('user::notifications.table_missing.title'))
            ->body(__('user::notifications.table_missing.body', ['table' => $tableName]))
            ->persistent()
            ->warning()
            ->send();
    }

    /**
     * Configure an empty table in case the actual table is missing.
     */
    protected function configureEmptyTable(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->whereNull('id'))
            ->columns([
                TextColumn::make('message')
                    ->label(__('user::fields.message.label'))
                    ->default(__('user::fields.message.default'))
                    ->html(),
            ])
            ->headerActions([])
            ->actions([]);
    }
}