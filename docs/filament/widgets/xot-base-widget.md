# XotBaseWidget

La classe astratta `XotBaseWidget` fornisce una base comune per tutti i widget Filament nel modulo Xot.

## Caratteristiche Principali

- Estende `Filament\Widgets\Widget`
- Integra funzionalità per i form
- Supporta filtri di pagina
- Gestione automatica delle viste
- Configurazione flessibile

## Proprietà

```php
public string $title = '';        // Titolo del widget
public string $icon = '';         // Icona del widget
protected int|string|array $columnSpan = 'full';  // Larghezza del widget
```

## Traits Integrati

- `InteractsWithPageFilters`: Gestione dei filtri di pagina
- `InteractsWithForms`: Interazione con i form

## Form Schema

Ogni widget deve implementare il proprio schema di form:

```php
abstract public function getFormSchema(): array;

final public function form(Form $form): Form
{
    return $form
        ->schema($this->getFormSchema())
        ->columns(2)
        ->statePath('data');
}
```

## Best Practices

1. **Estensione della Classe**
   ```php
   use Modules\Xot\Filament\Widgets\XotBaseWidget;

   class YourWidget extends XotBaseWidget
   {
       public function getFormSchema(): array
       {
           return [
               // Definisci lo schema del form
           ];
       }
   }
   ```

2. **Gestione delle Viste**
   - Le viste vengono risolte automaticamente
   - Utilizzare il namespace del modulo per le viste
   - Seguire le convenzioni di naming

3. **Configurazione**
   - Personalizzare titolo e icona
   - Definire la larghezza appropriata
   - Implementare azioni di salvataggio quando necessario

4. **Filtri**
   - Utilizzare i metodi di `InteractsWithPageFilters`
   - Gestire gli aggiornamenti dei filtri
   - Mantenere la coerenza nella struttura

## Dipendenze

- Filament Widgets
- Filament Forms
- Modules Xot

## Eventi

```php
public array $listener = [
    'filters-updated' => 'filtersUpdated',
];
```

## Note di Sviluppo

- La classe è astratta e deve essere estesa
- Le viste vengono risolte automaticamente tramite `GetViewByClassAction`
- Supporta la personalizzazione completa del form
- Integra gestione cache per ottimizzazione

## Link Correlati

- [Documentazione Filament](../../../docs/filament/index.md)
- [Gestione Widget](../../../docs/filament/widgets.md)
- [Form Schema](../../../docs/filament/forms.md) 