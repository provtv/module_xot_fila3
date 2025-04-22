<?php

declare(strict_types=1);

namespace Modules\Xot\Exceptions\Formatters;

use Illuminate\Support\Facades\Auth;

<<<<<<< HEAD
class WebhookErrorFormatter
{
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
    public function __construct(
        private \Throwable $exception
    ) {}
=======
<<<<<<< HEAD
class WebhookErrorFormatter
{
    public function __construct(
        private readonly \Throwable $exception
    ) {
    }
>>>>>>> 50bb41c (fix: auto resolve conflict)

    /**
     * @return array<string, mixed>
     */
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
    public function __construct(private readonly \Throwable $exception)
    {
    }

>>>>>>> origin/dev
>>>>>>> origin/dev
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
    public function format(): array
    {
        $user = Auth::user();
        $email = $user->email ?? 'CLI User';

        return [
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
            'message' => $this->exception->getMessage(),
            'file' => $this->exception->getFile(),
            'line' => $this->exception->getLine(),
            'trace' => $this->exception->getTraceAsString(),
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
            'exception' => sprintf(
                '`%s` (Code `%s`)',
                get_class($this->exception),
                $this->exception->getCode()
            ),
            'thrown_in' => sprintf(
                '`%s`:%d',
                $this->exception->getFile(),
                $this->exception->getLine()
            ),
            'user' => sprintf('%d <%s>', Auth::id() ?? 0, $email),
            'ip' => request()->ip(),
<<<<<<< HEAD
=======
=======
// use Symfony\Component\HttpFoundation\Request;

class WebhookErrorFormatter
{
    // private Request $request;

    public function __construct(private readonly \Throwable $exception)
    {
        // $this->request = $request;
    }

    public function format(): array
    {
        $user = Auth::user();
        $email = 'CLI User';
        if (null !== $user) {
            $email = $user->email;
        }

        return [
            'exception' => '`'.$this->exception::class.sprintf('` (Code `%s`)', $this->exception->getCode()),
            'thrown_in' => sprintf('`%s`:%d', $this->exception->getFile(), $this->exception->getLine()),
            'user' => sprintf(
                '%d <%s>',
                Auth::id(),
                $email
            ),
            'ip' => request()->ip(),
            // Request::ip();
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
            'thrown_while_calling' => sprintf(
                '[%s] %s',
                request()->getMethod(),
                request()->fullUrl()
            ),
            'url_previous' => url()->previous(),
            /*
            'exception_details' => sprintf(
                "Trace:\n```json \n %s \n ```\n\n Previous: \n `%s`",
                json_encode($this->exception->getTrace(), JSON_PRETTY_PRINT),
<<<<<<< HEAD
                $this->exception->getPrevious() ? ('`' . get_class($this->exception->getPrevious()) . '`') : 'None'
=======
<<<<<<< HEAD
                $this->exception->getPrevious() ? ('`' . get_class($this->exception->getPrevious()) . '`') : 'None'
=======
                $this->exception->getPrevious() ? ('`'.get_class($this->exception->getPrevious()).'`') : 'None'
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
            ),
            */
        ];
    }
}
