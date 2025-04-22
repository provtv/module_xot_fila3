<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\View;

use Illuminate\Support\Arr;
use Illuminate\View\FileViewFinder;
use Modules\Xot\Datas\XotData;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;
use Nwidart\Modules\Facades\Module;
<<<<<<< HEAD
=======
<<<<<<< HEAD
use Nwidart\Modules\Facades\Module;
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)

class GetViewNameSpacePathAction
{
    use QueueableAction;

    /**
     * @throws \Exception
     */
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    public function execute(?string $module_name = null): string
    {
        if (null !== $module_name && '' !== $module_name) {
            $module_path = Module::getModulePath($module_name);
            /** @var non-falsy-string $namespace_path */
            $namespace_path = $module_path.'Resources/views';
        } else {
            /** @var non-falsy-string $namespace_path */
            $namespace_path = resource_path('views');
        }

        return $namespace_path;
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
    public function execute(string $ns): string
    {
        $xot = XotData::make();
        /** @var FileViewFinder $finder */
        $finder = view()->getFinder();
        $viewHints = [];
        if (method_exists($finder, 'getHints')) {
            /** @var array<string, array<string>> $viewHints */
            $viewHints = $finder->getHints();
        }

        $path = Arr::get($viewHints, "$ns.0");
        if (! empty($path) && is_string($path)) {
            return $path;
        }

        if (\in_array($ns, ['pub_theme', 'adm_theme'], false)) {
            Assert::string($theme_name = ($xot->{$ns} ?? ''));

            return base_path('Themes/'.$theme_name);
        }

        throw new \Exception('View namespace not found['.$ns.'].');
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    }
}
