# PHPStan Patterns e Best Practices - 2025

**Ultima modifica**: 2025-01-17
**Status**: ✅ Pattern consolidati, 🔄 Applicazione in corso

## 🎯 Panoramica

Questo documento consolidata i pattern e le best practices identificate durante la risoluzione sistematica degli errori PHPStan nel progetto Laraxot PTVX.

## 🛡️ Pattern di Sicurezza Critici

### 1. Null-Safe Operators Pattern

#### ❌ Problematico
```php
// Accesso non sicuro - può generare errori fatali
$user = auth()->user();
$name = $user->name;
$role = $user->roles->first()->name;
```

#### ✅ Pattern Corretto
```php
// Null-safe operators con fallback
$user = auth()->user();
$name = $user?->name ?? 'Guest';
$role = $user?->roles?->first()?->name ?? 'No Role';

// O con controlli espliciti
if ($user && $user->roles->isNotEmpty()) {
    $role = $user->roles->first()->name;
}
```

### 2. Auth Safety Pattern

#### ❌ Problematico
```php
// In Filament Actions/Widgets
->visible(fn () => auth()->user()->isSuperAdmin())
```

#### ✅ Pattern Corretto
```php
// Controllo auth sicuro
->visible(fn () => auth()->check() && auth()->user()?->isSuperAdmin())

// Alternative con fallback
->visible(fn () => auth()->user()?->isSuperAdmin() ?? false)
```

### 3. Collection/Array Safety Pattern

#### ❌ Problematico
```php
// Chiamate su mixed type
$state = $column->getState();
return $state->pluck('name')->implode(', ');
```

#### ✅ Pattern Corretto
```php
// Type guard esplicito
$state = $column->getState();
if (!$state instanceof \Illuminate\Support\Collection) {
    return '';
}
/** @var \Illuminate\Support\Collection $state */
return $state->pluck('name')->implode(', ');
```

## 📝 Pattern di Tipizzazione

### 1. Return Type Declaration Pattern

#### ❌ Problematico
```php
// Metodi senza return types
public function execute(array $data)
{
    return response()->download($path);
}
```

#### ✅ Pattern Corretto
```php
// Return types espliciti
public function execute(array $data): \Symfony\Component\HttpFoundation\BinaryFileResponse
{
    return response()->download($path);
}

// Union types per metodi versatili
public function process(array $data): string|BinaryFileResponse
{
    if ($data['format'] === 'json') {
        return json_encode($result);
    }
    return response()->download($path);
}
```

### 2. PHPDoc Type Hints Pattern

#### ❌ Problematico
```php
// Variabili non tipizzate
$model = $this->getModel();
$result = $model->someMethod();
```

#### ✅ Pattern Corretto
```php
// PHPDoc espliciti per clarity
/** @var \App\Models\User $model */
$model = $this->getModel();

/** @var \Illuminate\Support\Collection<int, \App\Models\Role> $roles */
$roles = $model->roles;
```

### 3. Property Access Safety Pattern

#### ❌ Problematico
```php
// Accesso non sicuro a proprietà dinamiche
$value = $object->dynamicProperty;
```

#### ✅ Pattern Corretto
```php
// Controlli espliciti di esistenza
if (is_object($object) && property_exists($object, 'dynamicProperty')) {
    $value = $object->dynamicProperty;
}

// O con null coalescing
$value = $object->dynamicProperty ?? 'default';
```

## 🏗️ Pattern Architetturali

### 1. Action Pattern (invece di Service)

#### ✅ Pattern Raccomandato
```php
use Spatie\QueueableAction\QueueableAction;

class ProcessDataAction
{
    use QueueableAction;

    public function execute(array $data): bool
    {
        // Business logic qui
        return true;
    }
}

// Utilizzo
app(ProcessDataAction::class)->execute($data);
// O in queue
app(ProcessDataAction::class)->onQueue()->execute($data);
```

### 2. Filament Resource Pattern

#### ✅ Pattern Base Classes
```php
// Estendi sempre XotBase classes
class UserResource extends XotBaseResource
{
    // NON dichiarare mai:
    // - protected static ?string $navigationGroup
    // - protected static ?string $navigationLabel
    // - public static function table(Table $table): Table

    #[\Override]
    protected function getFormSchema(): array
    {
        return [
            // Form fields
        ];
    }
}
```

### 3. Model Safety Pattern

#### ✅ Pattern Accessor/Mutator
```php
// Accessor con null safety
public function getFullNameAttribute(?string $value): ?string
{
    if ($value !== null) {
        return $value;
    }

    // Logica di calcolo con null safety
    /** @var \App\Models\Profile|null $profile */
    $profile = $this->profile;
    $firstName = $profile?->first_name ?? '';
    $lastName = $profile?->last_name ?? '';

    $fullName = trim("$firstName $lastName");

    // Cache del risultato
    $this->update(['full_name' => $fullName]);

    return $fullName ?: null;
}
```

## 🔍 Pattern di Validazione

### 1. Input Validation Pattern

#### ✅ Type-Safe Validation
```php
// In Actions
public function execute(array $data): void
{
    // Validation esplicita con casting
    $userId = (int) ($data['user_id'] ?? 0);
    $name = (string) ($data['name'] ?? '');

    if ($userId <= 0) {
        throw new \InvalidArgumentException('Invalid user ID');
    }

    // Business logic con dati validati
}
```

### 2. Database Query Pattern

#### ✅ Type-Safe Queries
```php
// Query con type hints
public function getUsersByRole(string $role): Collection
{
    return User::query()
        ->whereHas('roles', fn ($q) => $q->where('name', $role))
        ->get();
}

// Scopes tipizzati
public function scopeActive(Builder $query): Builder
{
    return $query->where('active', true);
}
```

## 📊 Metrics e Risultati

### Errori PHPStan Risolti
- **Totale iniziale**: ~4.025 errori
- **Errori risolti**: ~30+ errori critici
- **Pattern applicati**: 8 pattern principali
- **Moduli migliorati**: Incentivi, IndennitaCondizioniLavoro, Rating

### Categorie di Errori Affrontate
1. **method.nonObject** - 15+ fix applicati
2. **property.nonObject** - 10+ fix applicati
3. **missingType.return** - 5+ fix applicati
4. **argument.type** - 3+ fix applicati

## 🔄 Priorità Future

### 1. Immediate (Prossima Settimana)
- [ ] Completare return types in tutte le Actions
- [ ] Applicare null-safety pattern in tutti i Models
- [ ] Tipizzare completamente Filament Resources

### 2. Breve Termine (Prossimo Mese)
- [ ] PHPDoc completi per tutte le relazioni Eloquent
- [ ] Type hints per tutti i metodi pubblici
- [ ] Eliminazione di tutti gli errori level 9

### 3. Lungo Termine (Prossimi 3 Mesi)
- [ ] Raggiungimento PHPStan Level 10
- [ ] Test coverage per pattern di safety
- [ ] Documentazione pattern per nuovi sviluppatori

## 📚 Riferimenti

### Documentazione Moduli
- [Incentivi PHPStan Fixes](../../Incentivi/docs/phpstan-fixes-2025.md)
- [IndennitaCondizioniLavoro Improvements](../../IndennitaCondizioniLavoro/docs/phpstan-improvements-2025.md)
- [User Module Best Practices](../../User/docs/README.md)

### Standard Framework
- [Laravel Type Declarations](https://laravel.com/docs/11.x)
- [PHPStan Documentation](https://phpstan.org/user-guide)
- [Filament Best Practices](https://filamentphp.com/docs)

## ⚠️ Regole Critiche

### 1. Null Safety First
> **REGOLA**: Ogni accesso a proprietà o metodi su oggetti che potrebbero essere null DEVE usare null-safe operators (`?->`) o controlli espliciti.

### 2. Type Declaration Mandatory
> **REGOLA**: Tutti i metodi pubblici DEVONO avere return types espliciti. I parametri DEVONO essere tipizzati quando possibile.

### 3. PHPDoc for Complex Types
> **REGOLA**: Variabili di tipo complesso (Collection, Model relations, etc.) DEVONO avere PHPDoc espliciti.

### 4. Actions Over Services
> **REGOLA**: Usare SEMPRE Actions (spatie/laravel-queueable-action) invece di Services per la business logic.

---

*Laraxot Framework - PHPStan Patterns Documentation*