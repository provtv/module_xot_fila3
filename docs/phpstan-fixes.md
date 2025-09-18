<<<<<<< HEAD
# Correzioni PHPStan - 6 Gennaio 2025

## Errori Risolti

### 1. Chart/app/Datas/AnswersChartData.php

**Problema**: Errori `argument.type` e `offsetAccess.nonOffsetAccessible`
- Linee 208, 254: `count()` su mixed
- Linee 450, 460, 492, 496: Accesso offset su mixed

**Soluzione**:
- Aggiunto controllo `\is_array()` prima di `count()`
- Aggiunto controllo esistenza `$options['plugins']` prima dell'accesso
- Utilizzato variabile intermedia per evitare chiamate multiple

### 2. Chart/app/Models/Chart.php

**Problema**: Linea 187 - Tipo di ritorno errato
- Metodo `getSettings()` doveva restituire `array<string, mixed>` ma restituiva `array<int, array<mixed>>`

**Soluzione**:
- Corretto tipo di ritorno a `array<string, array<string, mixed>>`
- Aggiunto cast esplicito con `@var` per il risultato

### 3. Job/app/Actions/GetTaskFrequenciesAction.php

**Problema**: Linea 21 - Tipo di ritorno errato
- Metodo doveva restituire `array<string, mixed>` ma restituiva `array<mixed, mixed>`

**Soluzione**:
- Aggiunto cast esplicito `@var array<string, mixed>` al risultato

### 4. <nome progetto>/app/States/Appointment/ReportPending.php
### 4. SaluteOra/app/States/Appointment/ReportPending.php

**Problema**: Linea 27 - Tipo di ritorno errato
- Metodo doveva restituire `array<string, Component>` ma restituiva `array<int|string, Component>`

**Soluzione**:
- Aggiunto PHPDoc con tipo di ritorno corretto
- Aggiunto cast esplicito al risultato

### 5. User/app/Console/Commands/ChangeTypeCommand.php

**Problema**: Linea 80 - Accesso proprietà su mixed
- `$item->value` e `$item->getLabel()` su mixed

**Soluzione**:
- Aggiunto controllo `is_object($item) && method_exists($item, 'getLabel')`
- Gestito caso fallback per valori sconosciuti

### 6. Xot/app/Models/Traits/HasExtraTrait.php

**Problema**: Linea 62 - Tipo di ritorno errato
- Metodo doveva restituire tipo specifico ma restituiva `array<mixed, mixed>`

**Soluzione**:
- Aggiunto tipo di ritorno esplicito al metodo
- Aggiunto cast esplicito con `@var` al risultato

### 7. Xot/app/Services/ModuleService.php

**Problema**: Linea 112 - Tipo di ritorno errato
- Metodo doveva restituire `array<int, string>` ma restituiva `array<string, class-string>`

**Soluzione**:
- Corretto tipo di ritorno PHPDoc a `array<string, class-string>`

### 8. Xot/app/States/Transitions/XotBaseTransition.php

**Problema**: Linea 39 - Tipo parametro errato
- `sendRecipientNotification()` aspettava `UserContract|null` ma riceveva `Model|null`

**Soluzione**:
- Separato controllo per `UserContract` e `null`
- Chiamate esplicite per ogni tipo

## Pattern Comuni Identificati

1. **Array Types**: Sempre specificare tipi degli array con `array<key, value>`
2. **Mixed Handling**: Controllare tipi prima dell'uso con `is_array()`, `is_object()`
3. **Offset Access**: Verificare esistenza chiavi prima dell'accesso
4. **Return Types**: Usare cast espliciti `@var` quando necessario
5. **Union Types**: Separare logica per ogni tipo possibile

## Regole Applicate

- **REGOLA ASSOLUTA**: Non modificare `phpstan.neon`
- Specificare sempre tipi degli array: `array<string, mixed>` per associativi
- Utilizzare controlli di tipo prima dell'uso
- Aggiungere PHPDoc completi per tutti i metodi
- Cast espliciti quando necessario per compatibilità PHPStan

## Collegamenti

- [PHPStan Critical Rules](./phpstan-critical-rules.md)
- [Array Types Fixes](./phpstan-array-types-fixes.md)
- [PHPStan Level 10 Guidelines](./phpstan-level10-guidelines.md)

*Ultimo aggiornamento: 6 Gennaio 2025*
=======
# PHPStan Fixes - Xot Module

## Errori Risolti

### 1. Action Execute Method Return Type Error
**File**: `app/Actions/Mail/SendMailByRecordsAction.php`
**Errore**: `A void method must not return a value`
**Causa**: Il metodo `execute()` era dichiarato come `void` ma il PHPDoc indicava che dovrebbe restituire `bool` e stava effettivamente restituendo `true`
**Soluzione**: Cambiato il tipo di ritorno da `void` a `bool`

```php
// PRIMA (ERRATO)
/**
 * @return bool
 */
public function execute(): void {
    foreach ($records as $record) {
        app(SendMailByRecordAction::class)->execute($record, $mail_class);
    }
    return true;  // ERRORE: void method non può restituire valori
}

// DOPO (CORRETTO)
/**
 * @return bool
 */
public function execute(): bool {
    foreach ($records as $record) {
        app(SendMailByRecordAction::class)->execute($record, $mail_class);
    }
    return true;  // OK: bool method può restituire true
}
```

**Motivazione**: Le Actions di Spatie QueueableAction possono restituire valori per indicare il successo o il fallimento dell'operazione. In questo caso, restituisce `true` per indicare che l'invio delle email è stato completato con successo.

**Business Logic**: Questa action gestisce l'invio di email multiple a una collezione di record, utilizzando un'action separata per ogni singolo record. È parte del sistema di notifiche del framework Laraxot.

### 2. Trait Method Return Type Error
**File**: `app/Models/Traits/RelationX.php`
**Errore**: `A void method must not return a value`
**Causa**: Il metodo `guessMorphPivot()` era dichiarato come `void` ma restituiva un oggetto `MorphPivot`
**Soluzione**: Cambiato il tipo di ritorno da `void` a `\Illuminate\Database\Eloquent\Relations\MorphPivot`

```php
// PRIMA (ERRATO)
/**
 * @return \Illuminate\Database\Eloquent\Relations\MorphPivot
 */
public function guessMorphPivot(): void {
    $class = $this::class;
    $pivot_name = class_basename($related).'Morph';
    
    $pivot_class = $this->guessPivotFullClass($pivot_name, $related, $class);
    $pivot = app($pivot_class);
    Assert::isInstanceOf($pivot,\Illuminate\Database\Eloquent\Relations\MorphPivot::class);
    return $pivot;  // ERRORE: void method non può restituire valori
}

// DOPO (CORRETTO)
/**
 * @return \Illuminate\Database\Eloquent\Relations\MorphPivot
 */
public function guessMorphPivot(): \Illuminate\Database\Eloquent\Relations\MorphPivot {
    $class = $this::class;
    $pivot_name = class_basename($related).'Morph';
    
    $pivot_class = $this->guessPivotFullClass($pivot_name, $related, $class);
    $pivot = app($pivot_class);
    Assert::isInstanceOf($pivot,\Illuminate\Database\Eloquent\Relations\MorphPivot::class);
    return $pivot;  // OK: MorphPivot method può restituire MorphPivot
}
```

**Motivazione**: Il metodo `guessMorphPivot()` è utilizzato per determinare dinamicamente la classe pivot per relazioni morph many-to-many. Deve restituire un'istanza della classe pivot per essere utilizzata nelle relazioni Eloquent.

**Business Logic**: Questo trait fornisce funzionalità avanzate per la gestione delle relazioni Eloquent, inclusa la determinazione automatica delle classi pivot. È parte del sistema di ORM avanzato del framework Laraxot.

## Pattern Identificati

### Spatie QueueableAction
- Le actions possono restituire valori per indicare il risultato dell'operazione
- Utilizzare `bool` per indicare successo/fallimento
- Utilizzare tipi più specifici quando appropriato (es. `string` per messaggi, `int` per conteggi)

### Action Chaining
- Le actions possono chiamare altre actions per decomporre operazioni complesse
- Utilizzare `app(ActionClass::class)->execute()` per dependency injection
- Mantenere coerenza nei tipi di ritorno tra actions correlate

## Collegamenti
- [README.md](./README.md)
- [Troubleshooting](./troubleshooting.md)
- [Best Practices](../docs/best-practices.md)
>>>>>>> 04664ea (.)
