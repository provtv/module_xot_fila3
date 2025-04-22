# Convenzioni per i Namespace nei Moduli Laraxot

Questo documento definisce le convenzioni per i namespace nei moduli del framework Laraxot PTVX, un aspetto fondamentale per garantire la compatibilità con PHPStan livello 9 e la coerenza del codice.

## Regola Fondamentale: Omettere "app" nel Namespace

Anche se i file sono fisicamente collocati nella directory `app` del modulo, il namespace **NON** deve includere questo segmento.

### ✅ CORRETTO
```php
namespace Modules\Rating\Models;
namespace Modules\Rating\Http\Controllers;
namespace Modules\Rating\Providers;
namespace Modules\Rating\Datas;
namespace Modules\Rating\Actions;
namespace Modules\Rating\Console\Commands;
```

### ❌ ERRATO
```php
namespace Modules\Rating\App\Models;
namespace Modules\Rating\App\Http\Controllers;
namespace Modules\Rating\App\Providers;
namespace Modules\Rating\App\Datas;
namespace Modules\Rating\App\Actions;
namespace Modules\Rating\App\Console\Commands;
```

## Attenzione: Errore comune con il namespace delle Actions

Un errore particolarmente frequente riguarda le Actions. La convenzione corretta è la seguente:

- ✅ **CORRETTO**: `namespace Modules\Xot\Actions;`
- ❌ **ERRATO**: `namespace Modules\Xot\app\Actions;`

Anche se il file si trova nel percorso fisico `Modules/Xot/app/Actions/`, il namespace non deve mai includere il segmento `app`.

Questo errore causa spesso problemi di PHPStan come:
```
Class 'Modules\Xot\app\Actions\MyAction' not found.
```

La correzione è sempre la stessa: rimuovere il segmento `app` dal namespace.

## Struttura Completa dei Namespace per Componenti Comuni

### Modelli

```php
<?php

declare(strict_types=1);

namespace Modules\Rating\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    // Implementazione
}
```

### Controller

```php
<?php

declare(strict_types=1);

namespace Modules\Rating\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RatingController extends Controller
{
    // Implementazione
}
```

### Data Objects

```php
<?php

declare(strict_types=1);

namespace Modules\Rating\Datas;

use Spatie\LaravelData\Data;

class RatingData extends Data
{
    // Implementazione
}
```

### Actions

```php
<?php

declare(strict_types=1);

namespace Modules\Rating\Actions;

use Spatie\QueueableAction\QueueableAction;

class CreateRatingAction
{
    use QueueableAction;
    
    // Implementazione
}
```

### Console Commands

```php
<?php

declare(strict_types=1);

namespace Modules\Rating\Console\Commands;

use Illuminate\Console\Command;

class RatingCommand extends Command
{
    protected $signature = 'rating:process';
    
    // Implementazione
}
```

### Service Providers

```php
<?php

declare(strict_types=1);

namespace Modules\Rating\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;

class RatingServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'Rating';
    protected string $module_dir = __DIR__;
    protected string $module_ns = __NAMESPACE__;
    
    // Implementazione
}
```

## Corrispondenza tra Struttura delle Directory e Namespace

| Directory fisica                             | Namespace corretto                   |
|---------------------------------------------|-------------------------------------|
| `Modules/Rating/app/Models/`                | `Modules\Rating\Models`             |
| `Modules/Rating/app/Http/Controllers/`      | `Modules\Rating\Http\Controllers`   |
| `Modules/Rating/app/Providers/`             | `Modules\Rating\Providers`          |
| `Modules/Rating/app/Datas/`                 | `Modules\Rating\Datas`              |
| `Modules/Rating/app/Actions/`               | `Modules\Rating\Actions`            |
| `Modules/Rating/app/Console/Commands/`      | `Modules\Rating\Console\Commands`   |
| `Modules/Rating/app/Filament/Resources/`    | `Modules\Rating\Filament\Resources` |
| `Modules/Rating/app/Filament/Pages/`        | `Modules\Rating\Filament\Pages`     |

## Namespace nei Moduli con Sottodirectory

Per moduli con strutture più complesse che utilizzano sottodirectory, mantenere la coerenza dei namespace:

```php
// File fisico: Modules/Rating/app/Models/Concerns/HasRatings.php
namespace Modules\Rating\Models\Concerns;

// File fisico: Modules/Rating/app/Http/Controllers/Api/RatingController.php
namespace Modules\Rating\Http\Controllers\Api;

// File fisico: Modules/Rating/app/Console/Commands/Generators/MakeRatingCommand.php
namespace Modules\Rating\Console\Commands\Generators;
```

## Import e Use Statements

Utilizzare sempre import completi e qualificati per evitare ambiguità:

```php
// CORRETTO
use Modules\Rating\Models\Rating;
use Modules\User\Models\User;

// EVITARE
use Modules\Rating\Models\Rating as RatingModel;
```

## Test di Validazione Namespace

Per verificare la correttezza dei namespace, utilizzare il seguente test Pest:

```php
test('verifica correttezza namespace', function () {
    $basePath = base_path('Modules');
    $modules = array_filter(scandir($basePath), fn($item) => 
        is_dir($basePath . '/' . $item) && !in_array($item, ['.', '..'])
    );
    
    $errors = [];
    
    foreach ($modules as $module) {
        $appPath = $basePath . '/' . $module . '/app';
        if (!is_dir($appPath)) continue;
        
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($appPath)
        );
        
        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getExtension() === 'php') {
                $content = file_get_contents($file->getRealPath());
                if (preg_match('/namespace\s+[^;]+;/', $content, $matches)) {
                    $namespace = $matches[0];
                    if (strpos($namespace, '\app\\') !== false) {
                        $errors[] = sprintf(
                            'File %s contiene namespace non valido: %s',
                            $file->getRealPath(),
                            $namespace
                        );
                    }
                }
            }
        }
    }
    
    expect($errors)
        ->withContext("I seguenti file contengono namespace non validi:\n" . implode("\n", $errors))
        ->toBeEmpty();
}); 