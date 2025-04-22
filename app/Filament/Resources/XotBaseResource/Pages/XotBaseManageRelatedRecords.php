<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\XotBaseResource\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\Component;
use Filament\Tables\Actions\CreateAction;
use Modules\Xot\Filament\Traits\HasXotTable;
use Filament\Forms\Concerns\InteractsWithForms;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;
use Filament\Resources\Pages\ManageRelatedRecords as FilamentManageRelatedRecords;

/**
 * Classe base per la gestione delle relazioni nelle risorse Filament.
 * Estende la classe ManageRelatedRecords di Filament e fornisce funzionalità aggiuntive
 * specifiche per il framework Laraxot.
 */
abstract class XotBaseManageRelatedRecords extends FilamentManageRelatedRecords
{

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables;
use Modules\Xot\Filament\Traits\HasXotTable;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;

abstract class XotBaseManageRelatedRecords extends ManageRelatedRecords implements HasForms
{
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    use HasXotTable;
    use InteractsWithForms;
    use NavigationLabelTrait;

    // protected static string $resource;

    public static function getNavigationGroup(): string
    {
        return '';
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    /*
     * @return array<\Filament\Forms\Components\Component>
     */
    // abstract public static function getFormSchema(): array;

    /**
     * Definisce le colonne della tabella per la visualizzazione dei record correlati.
     * Questo metodo può essere sovrascritto nelle classi figlie.
     *
     * @return array<string, TextColumn>
     */
    public function getListTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')
                ->label('ID')
                ->sortable(),

            'name' => TextColumn::make('name')
                ->label('Nome')
                ->searchable()
                ->sortable(),

            'created_at' => TextColumn::make('created_at')
                ->label('Data Creazione')
                ->dateTime('d/m/Y H:i')
                ->sortable(),
        ];
    }

    /**
     * Definisce le azioni dell'intestazione della tabella.
     * Questo metodo può essere sovrascritto nelle classi figlie.
     *
     * @return array<string, Action>
     */
    public function getTableHeaderActions(): array
    {
        return [
            'create' => CreateAction::make()
                ->label('Crea Nuovo')
                ->disableCreateAnother(),
        ];
    }

    /**
     * Definisce le azioni per ogni riga della tabella.
     * Questo metodo può essere sovrascritto nelle classi figlie.
     *
     * @return array<string, Action>
     */
    public function getTableActions(): array
    {
        return [
            'edit' => Action::make('edit')
                ->label('Modifica')
                ->icon('heroicon-o-pencil')
                ->url(fn (Model $record): string => $this->getResource()::getUrl('edit', ['record' => $record])),

            'view' => Action::make('view')
                ->label('Visualizza')
                ->icon('heroicon-o-eye')
                ->url(fn (Model $record): string => $this->getResource()::getUrl('view', ['record' => $record])),
        ];
    }

    /**
     * Configura la tabella per la visualizzazione dei record correlati.
     */
    public function table(Table $table): Table
    {
        return $table
            ->columns($this->getListTableColumns())
            ->headerActions($this->getTableHeaderActions())
            ->actions($this->getTableActions())
            ->bulkActions([])
            ->emptyStateActions([
                'create' => CreateAction::make()
                    ->label('Crea Nuovo')
                    ->disableCreateAnother(),
            ]);
    }

    /**
     * Configura il form per la creazione/modifica dei record correlati.
     */
    public function form(Form $form): Form
    {
        return $form
            ->schema($this->getFormSchema());
    }

    /**
     * Restituisce il titolo della pagina.
     */
    public function getTitle(): string
    {
        $resource = static::getResource();
        $recordTitle = $this->getRecordTitle();
        $relationship = static::getRelationshipName();

        $titleString = '';
        if ($recordTitle instanceof \Illuminate\Contracts\Support\Htmlable) {
            $titleString = $recordTitle->toHtml();
        } else {
            $titleString = (string) $recordTitle;
        }

        return Str::of($relationship)
            ->title()
            ->prepend($titleString.' - ')
            ->toString();
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
    /**
     * @return array<\Filament\Forms\Components\Component>
     */
    public function getFormSchema(): array
    {
        return [];
    }

    public function form(Form $form): Form
    {
        return $form
            // ->model($this->getRecord()) // Assicurati di associare il record
            ->schema($this->getFormSchema());
    }

    protected function getHeaderActions(): array
    {
        return [
        ];
    }

    protected function getTableHeaderActions(): array
    {
        return [
            'create' => Tables\Actions\CreateAction::make('create')
                // ->icon('heroicon-o-plus')
                ->color('primary')
            // ->outlined(false)
            // ->iconButton()
            // ->badgeColor('success')
            // ->tooltip('Nuova Fase')
            // ->extraAttributes([
            //    'class' => 'mx-auto my-8 bg-primary',
            // ])
            // ->modalHeading('Crea Nuova Fase')
            // ->form($this->getFormSchema())
            ,
        ];
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    }
}
