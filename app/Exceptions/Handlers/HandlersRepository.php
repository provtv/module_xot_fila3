<?php

declare(strict_types=1);

namespace Modules\Xot\Exceptions\Handlers;

/**
 * The handlers repository.
 */
class HandlersRepository
{
    /**
     * The custom handlers reporting exceptions.
     */
    protected array $reporters = [];

    /**
     * The custom handlers rendering exceptions.
     */
    protected array $renderers = [];

    /**
     * The custom handlers rendering exceptions in console.
     */
    protected array $consoleRenderers = [];

    /**
     * Register a custom handler to report exceptions.
     */
    public function addReporter(callable $reporter): int
    {
        array_unshift($this->reporters, $reporter);
        return count($this->reporters);
<<<<<<< HEAD
=======
<<<<<<< HEAD
        array_unshift($this->reporters, $reporter);
        return count($this->reporters);
=======
        return array_unshift($this->reporters, $reporter);
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    }

    /**
     * Register a custom handler to render exceptions.
     */
    public function addRenderer(callable $renderer): int
    {
        array_unshift($this->renderers, $renderer);
        return count($this->renderers);
<<<<<<< HEAD
=======
<<<<<<< HEAD
        array_unshift($this->renderers, $renderer);
        return count($this->renderers);
=======
        return array_unshift($this->renderers, $renderer);
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    }

    /**
     * Register a custom handler to render exceptions in console.
     */
    public function addConsoleRenderer(callable $renderer): int
    {
        array_unshift($this->consoleRenderers, $renderer);
        return count($this->consoleRenderers);
<<<<<<< HEAD
=======
<<<<<<< HEAD
        array_unshift($this->consoleRenderers, $renderer);
        return count($this->consoleRenderers);
=======
        return array_unshift($this->consoleRenderers, $renderer);
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    }

    /**
     * Retrieve all reporters handling the given exception.
     */
    public function getReportersByException(\Throwable $e): array
    {
        return array_filter($this->reporters, function (mixed $handler) use ($e): bool {
            return is_callable($handler) && $this->handlesException($handler, $e);
        });
    }

    /**
     * Retrieve all renderers handling the given exception.
     */
    public function getRenderersByException(\Throwable $e): array
    {
        return array_filter($this->renderers, function (mixed $handler) use ($e): bool {
            return is_callable($handler) && $this->handlesException($handler, $e);
        });
    }

    /**
     * Retrieve all console renderers handling the given exception.
     */
    public function getConsoleRenderersByException(\Throwable $e): array
    {
        return array_filter($this->consoleRenderers, function (mixed $handler) use ($e): bool {
            return is_callable($handler) && $this->handlesException($handler, $e);
        });
    }

    /**
     * Determine whether the given handler can handle the provided exception.
     */
    protected function handlesException(callable $handler, \Throwable $e): bool
    {
        if ($handler instanceof \Closure) {
            $reflection = new \ReflectionFunction($handler);
        } else {
            $reflection = new \ReflectionFunction(\Closure::fromCallable($handler));
        }

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        $params = $reflection->getParameters();
        if (empty($params)) {
            return false;
        }

        if (!isset($params[0]) || !$params[0]->hasType()) {
            return true;
        }

        $type = $params[0]->getType();
        if (!$type instanceof \ReflectionNamedType || $type->isBuiltin()) {
            return true;
        }

        return is_a($e, $type->getName(), true);
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
        if (! $params = $reflection->getParameters()) {
            return false;
        }

        return $params[0]->getClass() instanceof \ReflectionClass ? $params[0]->getClass()->isInstance($e) : true;
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    }
}
