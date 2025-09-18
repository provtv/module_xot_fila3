<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Mail;

use Illuminate\Database\Eloquent\Collection;
use Spatie\QueueableAction\QueueableAction;

class SendMailByRecordsAction
{
    use QueueableAction;

    /**
     * Undocumented function.
     *
<<<<<<< HEAD
     * @return bool
     */
    public function execute(): void {
=======
     * @param Collection $records
     * @param string $mail_class
     * @return bool
     */
    public function execute(Collection $records, string $mail_class): bool {
>>>>>>> 04664ea (.)
        foreach ($records as $record) {
            app(SendMailByRecordAction::class)->execute($record, $mail_class);
        }

        return true;
    }
}
