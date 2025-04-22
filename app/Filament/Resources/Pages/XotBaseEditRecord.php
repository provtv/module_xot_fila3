<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord as FilamentEditRecord;

abstract class XotBaseEditRecord extends FilamentEditRecord
{
    // ...

    /**
     * Configure the form.
     *
     * @param Form $form The form instance to configure
     * @return Form The configured form
     */
    public function form(Form $form): Form
    {
        $schema = $this->getFormSchema();

        if (empty($schema)) {
            $resource = $this->getResource();
            $schema = $resource::getFormSchema();
        }

        // Ensure schema is properly typed for PHPStan level 10
        /** @var array<string|int, \Filament\Forms\Components\Component>|array<\Filament\Forms\Components\Component> $validSchema */
        $validSchema = $schema;

        return $form->schema($validSchema);
    }

    /**
     * Get the form schema.
     *
     * @return array<string|int, \Filament\Forms\Components\Component>|array<\Filament\Forms\Components\Component>
     */
    protected function getFormSchema(): array
    {
        return [];
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
use Filament\Resources\Pages\EditRecord as FilamenEditRecord;

abstract class XotBaseEditRecord extends FilamenEditRecord
{
    // ...
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
}
