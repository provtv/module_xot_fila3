<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Array;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;

class SaveArrayAction
{
    use QueueableAction;

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    public function execute(array $data, string $filename, string $format = 'php'): bool
    {
        return match ($format) {
            'json' => app(SaveJsonArrayAction::class)->execute($data, $filename),
            'php' => app(SavePhpArrayAction::class)->execute($data, $filename),
            default => throw new \InvalidArgumentException("Formato non supportato: {$format}")
        };
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
    public function execute(array $data, string $filename): void
    {
        $content = var_export($data, true);

        // HHVM fails at __set_state, so just use object cast for now
        $content = str_replace('stdClass::__set_state', '(object)', $content);

        $content = '<?php '.\chr(13).'return '.$content.';'.\chr(13);
        // $content = str_replace('stdClass::__set_state', '(object)', $content);
        File::makeDirectory(\dirname((string) $filename), 0775, true, true);
        File::put($filename, $content);
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    }
}
