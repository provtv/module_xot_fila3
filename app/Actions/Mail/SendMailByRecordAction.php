<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Mail;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Mailable;
<<<<<<< HEAD
use Illuminate\Support\Facades\Mail;
=======
<<<<<<< HEAD
use Illuminate\Support\Facades\Mail;
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class SendMailByRecordAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
     * Invia una mail utilizzando un record come dati.
     *
     * @param Model $record Il record da utilizzare come dati per la mail
     * @param string $mailClass La classe Mailable da utilizzare
     * @return void
<<<<<<< HEAD
=======
=======
     * Undocumented function.
     *
     * @return bool
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
     */
    public function execute(Model $record, string $mailClass): void
    {
        Assert::classExists($mailClass);
        Assert::implementsInterface($mailClass, Mailable::class);

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
        // Utilizziamo il container per istanziare la classe Mailable
        // in modo che possa ricevere le dipendenze necessarie
        /** @var Mailable $mail */
        $mail = app($mailClass, ['record' => $record]);
        Mail::send($mail);
<<<<<<< HEAD
=======
=======
        /** @var Mailable $mail */
        $mail = new $mailClass($record);
        $mail->send();
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
    }
}
