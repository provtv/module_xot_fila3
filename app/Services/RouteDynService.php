<?php

declare(strict_types=1);

namespace Modules\Xot\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use function Safe\preg_replace;
<<<<<<< HEAD
=======
<<<<<<< HEAD
use function Safe\preg_replace;
=======

use function is_array;
use function Safe\preg_replace;

>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
use Webmozart\Assert\Assert;

/**
 * Class RouteDynService.
 */
class RouteDynService
{
    private static string $namespace_start = '';

    // Commentato: La proprietà $curr non viene mai letta, quindi potrebbe essere rimossa
<<<<<<< HEAD
=======
<<<<<<< HEAD
    // Commentato: La proprietà $curr non viene mai letta, quindi potrebbe essere rimossa
=======
    // :24    Static property Modules\Xot\Services\RouteDynService::$curr is never read, only written.
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    // private static ?string $curr = null;

    public static function getGroupOpts(array $v, ?string $namespace): array
    {
        return [
            'prefix' => self::getPrefix($v, $namespace),
            'namespace' => self::getNamespace($v, $namespace),
            'as' => self::getAs($v, $namespace),
        ];
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    public static function getPrefix(array $v, ?string $namespace): string
    {
        if (isset($v['prefix'])) {
            Assert::string($prefix = $v['prefix']);
            return $prefix;
        }

        Assert::string($name = $v['name']);
        $prefix = mb_strtolower($name);
        $param_name = self::getParamName($v, $namespace);
        if ($param_name !== '') {
            return $prefix.'/{'.$param_name.'}';
        }

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
    // ret false|mixed|string|string[]

    public static function getPrefix(array $v, ?string $namespace): string
    {
        if (\in_array('prefix', array_keys($v), false)) {
            Assert::string($prefix = $v['prefix']);

            return $prefix;
        }
        Assert::string($name = $v['name']);
        $prefix = mb_strtolower($name);
        // /*
        $param_name = self::getParamName($v, $namespace);
        if ('' !== $param_name) {
            /*
            Call to function is_array() with string will always evaluate to false.
            if (\is_array($param_name)) {
                return $prefix.'/{'.\implode('}/{', $param_name).'}';
            }
            */
            return $prefix.'/{'.$param_name.'}';
        }

        // */
        /*
        $params_name=self::getParamsName($v,$namespace);
        if($params_name!=[]){
        return $prefix.'/{'.implode('}/{',$params_name).'}';
        }
         */
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        return $prefix;
    }

    public static function getAs(array $v, ?string $namespace): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        if (isset($v['as'])) {
            Assert::string($as = $v['as']);
            return $as;
        }

        Assert::string($name = $v['name']);
        $as = mb_strtolower($name);
        $as = str_replace('/', '.', $as);
<<<<<<< HEAD
        $as = preg_replace('/{.*}./', '', $as);
        $as = str_replace(['{', '}'], '', $as);
=======

        /** @var string $tmp */
        $tmp = preg_replace('/{.*}./', '', $as);
        if (!is_string($tmp)) {
            $tmp = $as; // Fallback se preg_replace fallisce
        }
        $as = $tmp;

        $as = str_replace(['{', '}'], '', $as);
<<<<<<< HEAD
=======
        if (\in_array('as', array_keys($v), false)) {
            Assert::string($as = $v['as']);

            return $as;
        }
        Assert::string($name = $v['name']);
        $as = mb_strtolower($name).'';
        $as = str_replace('/', '.', $as);
        Assert::string($as = preg_replace('/{.*}./', '', $as), '['.__LINE__.']['.class_basename(static::class).']');

        $as = str_replace('{', '', $as);
        $as = str_replace('}', '', $as);
        Assert::string($as, '['.__LINE__.']['.class_basename(static::class).']');
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)

        return $as.'.';
    }

    public static function getNamespace(array $v, ?string $namespace): ?string
    {
        if (isset($v['namespace'])) {
            Assert::string($namespace = $v['namespace']);
<<<<<<< HEAD
=======
<<<<<<< HEAD
        if (isset($v['namespace'])) {
            Assert::string($namespace = $v['namespace']);
=======
        if (\in_array('namespace', array_keys($v), false)) {
            Assert::string($namespace = $v['namespace']);

>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            return $namespace;
        }

        Assert::string($namespace = $v['name']);
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        $namespace = str_replace(['{', '}'], '', $namespace);
        if ($namespace === '') {
            return null;
        }

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
        $namespace = str_replace('{', '', $namespace);
        $namespace = str_replace('}', '', $namespace);
        if ('' === $namespace) {
            return null;
        }

        if (\is_array($namespace)) {
            throw new \Exception('namespace is array');
        }

>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        return Str::studly($namespace);
    }

    public static function getAct(array $v, ?string $namespace): string
    {
        if (isset($v['act'])) {
            Assert::string($act = $v['act']);
<<<<<<< HEAD
=======
<<<<<<< HEAD
        if (isset($v['act'])) {
            Assert::string($act = $v['act']);
=======
        if (\in_array('act', array_keys($v), false)) {
            Assert::string($act = $v['act']);

>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            return $act;
        }

        Assert::nullOrString($v['act'] = $v['name']);
<<<<<<< HEAD
<<<<<<< HEAD
        Assert::nullOrString($v['act']);
        $v['act'] = preg_replace('/{.*}\//', '', (string) $v['act']);
        if ($v['act'] === null) {
=======
<<<<<<< HEAD
=======
>>>>>>> 4ab3760 (.)

        $act = '';
        if (is_string($v['act'])) {
            /** @var string|null $tmp */
            $tmp = preg_replace('/{.*}\//', '', $v['act']);
            $act = $tmp !== null ? $tmp : $v['act'];

            $act = str_replace('/', '_', $act);
            $act = Str::camel($act);
            $act = str_replace(['{', '}'], '', $act);
        }

        return $act;
<<<<<<< HEAD
=======
        $v['act'] = preg_replace('/{.*}\//', '', (string) $v['act']);
        if (null === $v['act']) {
>>>>>>> 50bb41c (fix: auto resolve conflict)
            $v['act'] = '';
        }

        $v['act'] = str_replace('/', '_', $v['act']);
<<<<<<< HEAD
        $v['act'] = Str::camel($v['act']);
        $v['act'] = str_replace(['{', '}'], '', $v['act']);

        return Str::camel($v['act']);
=======
        if (! \is_string($v['act'])) {
            throw new \Exception('act is not a string');
        }

        $v['act'] = Str::camel($v['act']);
        $v['act'] = str_replace('{', '', $v['act']);
        $v['act'] = str_replace('}', '', $v['act']);

        // camel_case foo_bar  => fooBar
        // studly_case foo_bar => FooBar
        return Str::camel($v['act']);
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    }

    public static function getParamName(array $v, ?string $namespace): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        if (isset($v['param_name'])) {
            Assert::string($param_name = $v['param_name']);
            return $param_name;
        }

        Assert::string($name = $v['name']);
        $param_name = 'id_'.$name;
        $param_name = str_replace(['{', '}'], '', $param_name);

        return mb_strtolower($param_name);
    }

    public static function getParamsName(array $v, ?string $namespace): array
    {
        $param_name = self::getParamName($v, $namespace);
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
        if (\in_array('param_name', array_keys($v), false)) {
            Assert::string($param_name = $v['param_name']);

            return $param_name;
        }
        Assert::string($name = $v['name']);
        $param_name = 'id_'.$name;
        $param_name = str_replace('{', '', $param_name);
        $param_name = str_replace('}', '', $param_name);

        // $param_name=null;
        return mb_strtolower($param_name);
    }

    /**
     * @return array|false|string|array<string>
     */
    public static function getParamsName(array $v, ?string $namespace): array|false|string
    {
        $param_name = self::getParamName($v, $namespace);

        /*
        Call to function is_array() with string will always evaluate to false.
        if (! \is_array($param_name)) {
            $params_name = [$param_name];
        } else {
            $params_name = $param_name;
        }
        */
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        return [$param_name];
    }

    public static function getResourceOpts(array $v, ?string $namespace): array
    {
        $param_name = self::getParamName($v, $namespace);
        $params_name = self::getParamsName($v, $namespace);
        Assert::isArray($params_name);

<<<<<<< HEAD
=======
<<<<<<< HEAD
        Assert::isArray($params_name);

=======
        if (! \is_array($params_name)) {
            throw new \Exception('params_name is not an array');
        }
        Assert::nullOrString($v['name']);
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        $opts = [
            'parameters' => [mb_strtolower((string) $v['name']) => implode('}/{', $params_name)],
            'names' => self::prefixedResourceNames(self::getAs($v, $namespace)),
        ];
<<<<<<< HEAD
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        if (isset($v['only'])) {
            $opts['only'] = $v['only'];
        }

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        if ($param_name === '' && ! isset($opts['only'])) {
            $opts['only'] = ['index'];
        }

        $opts['where'] = array_fill_keys($params_name, '[0-9]+');
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
        if ('' === $param_name && ! isset($opts['only'])) {
            $opts['only'] = ['index'];
        }

        $where = [];
        foreach ($params_name as $param_name) {
            $where[$param_name] = '[0-9]+';
        }

        $opts['where'] = $where; // se c'e' "id_" di sicuro e' un numero

>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        return $opts;
    }

    public static function getController(array $v, ?string $namespace): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        if (isset($v['controller'])) {
            Assert::string($controller = $v['controller']);
            return $controller;
        }

<<<<<<< HEAD
<<<<<<< HEAD
        Assert::string($v['controller'] = $v['name']);
=======
<<<<<<< HEAD
        Assert::string($v['controller'] = $v['name']);
=======
        Assert::nullOrString($v['controller'] = $v['name']);
>>>>>>> origin/dev
>>>>>>> origin/dev
        $v['controller'] = str_replace(['/', '{', '}'], ['_', '', ''], $v['controller']);
        $v['controller'] = Str::studly($v['controller']);
=======
        Assert::string($v['controller'] = $v['name']);
        $v['controller'] = str_replace(['/', '{', '}'], ['_', '', ''], $v['controller']);
        $v['controller'] = Str::studly($v['controller']);
<<<<<<< HEAD
=======
        if (\in_array('controller', array_keys($v), false)) {
            Assert::string($controller = $v['controller']);

            return $controller;
        }

        Assert::nullOrString($v['controller'] = $v['name']);
        $v['controller'] = str_replace('/', '_', (string) $v['controller']);
        $v['controller'] = str_replace('{', '', $v['controller']);
        $v['controller'] = str_replace('}', '', $v['controller']);
        if (! \is_string($v['controller'])) {
            throw new \Exception('controller is not a string');
        }

        $v['controller'] = Str::studly($v['controller']);
        // camel_case foo_bar  => fooBar
        // studly_case foo_bar => FooBar
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        $v['controller'] .= 'Controller';

        return $v['controller'];
    }

    public static function getUri(array $v, ?string $namespace): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        Assert::string($name= $v['name']);
        //return mb_strtolower(is_string($v) ? $v : (string) $v['name);
        return $name;
=======
<<<<<<< HEAD
        Assert::string($name= $v['name']);
        //return mb_strtolower(is_string($v) ? $v : (string) $v['name);
        return $name;
=======
        Assert::nullOrString($v['name']);
        return mb_strtolower(is_string($v) ? $v : (string) $v['name']);
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
        Assert::string($name = $v['name']);
        return $name;
=======
        Assert::nullOrString($v['name']);

        return mb_strtolower((string) $v['name']);
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
        Assert::string($name = $v['name']);
        return $name;
>>>>>>> 4ab3760 (.)
    }

    public static function getMethod(array $v, ?string $namespace): array
    {
        if (isset($v['method'])) {
            return Arr::wrap($v['method']);
        }
<<<<<<< HEAD
=======
<<<<<<< HEAD
        if (isset($v['method'])) {
            return Arr::wrap($v['method']);
        }
=======
        if (\in_array('method', array_keys($v), false)) {
            return Arr::wrap($v['method']);
        }

>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        return ['get', 'post'];
    }

    public static function getUses(array $v, ?string $namespace): string
    {
        $controller = self::getController($v, $namespace);
        $act = self::getAct($v, $namespace);
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        return $controller.'@'.$act;
    }

    public static function getCallback(array $v, ?string $namespace, ?string $curr): array
    {
        Assert::string($name = $v['name']);
        $as = Str::slug($name);
        $uses = self::getUses($v, $namespace);
        if ($curr !== null) {
<<<<<<< HEAD
=======
<<<<<<< HEAD
        $as = Str::slug($name);
        $uses = self::getUses($v, $namespace);
        if ($curr !== null) {
=======
        $as = Str::slug($name); // !!!!!! test da controllare
        $uses = self::getUses($v, $namespace);
        if (null !== $curr) {
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            $uses = '\\'.self::$namespace_start.'\\'.$curr.'\\'.$uses;
        } else {
            $uses = '\\'.self::$namespace_start.'\\'.$uses;
        }

        return ['as' => $as, 'uses' => $uses];
    }

    public static function dynamic_route(array $array, ?string $namespace = null, ?string $namespace_start = null, ?string $curr = null): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        Assert::isArray($array, 'The $array parameter must be an array.');
        Assert::notEmpty($array, 'The $array parameter cannot be empty.');

        if ($namespace_start !== null) {
            self::$namespace_start = $namespace_start;
        }

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
        // Verifica che $array sia un array e non vuoto
        Assert::isArray($array, 'The $array parameter must be an array.');
        Assert::notEmpty($array, 'The $array parameter cannot be empty.');

        if (null !== $namespace_start) {
            self::$namespace_start = $namespace_start;
        }

        // Iterazione sull'array
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        foreach ($array as $v) {
            Assert::isArray($v, 'Each item in the array must be an array.');
            $group_opts = self::getGroupOpts($v, $namespace);
            $v['group_opts'] = $group_opts;

            self::createRouteResource($v, $namespace);

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            Route::group($group_opts, static function () use ($v, $namespace, $curr): void {
                self::createRouteActs($v, $namespace, $curr);
                self::createRouteSubs($v, $namespace, $curr);
            });
        }
    }

    public static function createRouteResource(array $v, ?string $namespace): void
    {
        if ($v['name'] === null) {
            return;
        }
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
        Assert::string($name= $v['name']);
        $opts = self::getResourceOpts($v, $namespace);
        $controller = self::getController($v, $namespace);
        
        
<<<<<<< HEAD
=======
=======
        Assert::string($v['name']);
        $opts = self::getResourceOpts($v, $namespace);
        $controller = self::getController($v, $namespace);
        $name = mb_strtolower(is_string($v) ? $v : (string) $v['name']);
>>>>>>> origin/dev
>>>>>>> origin/dev
        Route::resource($name, $controller, $opts);
    }

=======

        Assert::string($name = $v['name']);
        $opts = self::getResourceOpts($v, $namespace);
        $controller = self::getController($v, $namespace);

        Route::resource($name, $controller, $opts);
    }

<<<<<<< HEAD
=======
            Route::group(
                $group_opts,
                static function () use ($v, $namespace, $curr): void {
                    self::createRouteActs($v, $namespace, $curr);
                    self::createRouteSubs($v, $namespace, $curr);
                }
            );
        }
    }

    // end function

    // --------------------------------------------------------------------------------

    public static function createRouteResource(array $v, ?string $namespace): void
    {
        if (null === $v['name']) {
            return;
        }
        Assert::string($v['name']);
        $opts = self::getResourceOpts($v, $namespace);
        $controller = self::getController($v, $namespace);
        $name = mb_strtolower((string) $v['name']);
        Route::resource($name, $controller, $opts);
        // ->where(['container1' => "^((?!create|edit).)*$"])  //BadMethodCallException Method Illuminate\Routing\PendingResourceRegistration::where does not exist.
        //  ->middleware('manageContainer','container1')// ->where(['id_'.$v['name'] => '[0-9]+']);
    }

    // ------------------------------------------------------------------------------

>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    public static function createRouteSubs(array $v, ?string $namespace, ?string $curr): void
    {
        if (! isset($v['subs'])) {
            return;
        }

        $sub_namespace = self::getNamespace($v, $namespace);
        $curr = $curr === null ? $sub_namespace : $curr;
<<<<<<< HEAD
=======
<<<<<<< HEAD
        $curr = $curr === null ? $sub_namespace : $curr;
=======
        /*
        if(self::$curr==null){
        self::$curr=$sub_namespace;
        }else{
        if(self::$curr!=$sub_namespace){
        self::$curr=self::$curr.'\\'.$sub_namespace;
        }
        }
         */
        if (null === $curr) {
            $curr = $sub_namespace;
        } else {
            $piece = explode('\\', $curr);
            if (last($piece) !== $sub_namespace && $curr !== $sub_namespace) {
                $curr .= '\\'.$sub_namespace;
            }
        }
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        Assert::isArray($subs = $v['subs']);
        self::dynamic_route($subs, $sub_namespace, null, $curr);
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    public static function createRouteActs(array $v, ?string $namespace, ?string $curr): void
    {
        if (! isset($v['acts']) || ! is_array($v['acts'])) {
            return;
        }

        $controller = self::getController($v, $namespace);
        foreach ($v['acts'] as $v1) {
            Assert::isArray($v1);
            $v1['controller'] = $controller;
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
    // ---------------------------------------------------

    public static function createRouteActs(array $v, ?string $namespace, ?string $curr): void
    {
        if (! isset($v['acts'])) {
            return;
        }
        if (! \is_array($v['acts'])) {
            return;
        }

        reset($v['acts']);

        $controller = self::getController($v, $namespace);
        if (! is_iterable($v['acts'])) {
            return;
        }
        foreach ($v['acts'] as $v1) {
            Assert::isArray($v1);
            $v1['controller'] = $controller; // le acts hanno il controller del padre
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)

            $method = self::getMethod($v1, $namespace);
            $uri = self::getUri($v1, $namespace);
            $callback = self::getCallback($v1, $namespace, $curr);
            Route::match($method, $uri, $callback);
        }
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
    // /--------------------------------------------------------
    /* ?? deprecated ??
    public static function routes() {
        if ('' != \Request::path()) {
            $tmp = \explode('/', \Request::path());
            $tmp = \array_slice($tmp, 0, 2);
            $tmp = \implode('_', $tmp);
            //echo '<h3>tmp = '.$tmp.'</h3>';die();
            $filename = 'web_'.$tmp.'.php';

            $tmp = \debug_backtrace();
            dd($tmp[3]['class']);

            $filename_dir = __DIR__.\DIRECTORY_SEPARATOR.$filename;
            echo '<h3>tmp = '.$filename_dir.'</h3>';
            die();
            if (\file_exists($filename_dir)) {
                require $filename_dir;
            }
        }
    }
    */
    // end routes
    // ------------------------------------------------------------------

>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    public static function prefixedResourceNames(string $prefix): array
    {
        if ('.' === mb_substr($prefix, -1)) {
            $prefix = mb_substr($prefix, 0, -1);
        }

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        return [
            'index' => $prefix.'.index',
            'create' => $prefix.'.create',
            'store' => $prefix.'.store',
            'show' => $prefix.'.show',
            'edit' => $prefix.'.edit',
            'update' => $prefix.'.update',
            'destroy' => $prefix.'.destroy',
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
        // Strict comparison using === between null and non-empty-string will always evaluate to false.
        // if ('' === $prefix || null === $prefix) {
        if ('' === $prefix) {
            return ['index' => $prefix.'index', 'create' => $prefix.'create', 'store' => $prefix.'store', 'show' => $prefix.'show', 'edit' => $prefix.'edit', 'update' => $prefix.'update', 'destroy' => $prefix.'destroy'];
        }

        $prefix = mb_strtolower($prefix);

        return ['index' => $prefix.'.index', 'create' => $prefix.'.create', 'store' => $prefix.'.store', 'show' => $prefix.'.show', 'edit' => $prefix.'.edit', 'update' => $prefix.'.update', 'destroy' => $prefix.'.destroy'];
    }

    // end prefixedResourceNames

    // --------------------------------------------------

    public static function getContainerActs(): array
    {
        return [
            [
                'name' => 'Edit',
                'act' => 'indexEdit',
            ], // end act_n
            [
                'name' => 'Order',
                'act' => 'indexOrder',
            ], // end act_n
            [
                'name' => 'Attach',
                'act' => 'indexAttach',
            ], // end act_n
        ];
    }

    public static function getItemActs(): array
    {
        return [
            // ['name' => 'attach'], //end act_n
            ['name' => 'detach', 'method' => ['DELETE', 'GET']], // end act_n
            // ['name' => 'moveUp', 'method' => ['PUT', 'GET']],   // se uso "order" questi non mi servono
            // ['name' => 'moveDown', 'method' => ['PUT', 'GET']],
        ];
    }

    public static function generate(int $n = 0): array
    {
        if ($n > 4) {
            return [];
        }

        return [
            [
                'name' => '{container'.$n.'}',
                'param_name' => '',
                'as' => 'container'.$n.'.index_',
                'acts' => self::getContainerActs(),
                // 'only'=>[],
            ],
            [
                'name' => '{container'.$n.'}',
                'param_name' => 'item'.$n.'',
                'acts' => self::getItemActs(),
                'subs' => self::generate($n + 1),
            ],
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        ];
    }

    // --------------------------------------------------
}
