<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Module;

use Webmozart\Assert\Assert;

=======
<<<<<<< HEAD
use Webmozart\Assert\Assert;
use Illuminate\Support\Facades\File;

<<<<<<< HEAD
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
class GetModulePathByGeneratorAction
{
    public function execute(string $moduleName, string $generatorPath): string
    {
        $relativePath = config('modules.paths.generator.'.$generatorPath.'.path');

        $res = module_path($moduleName, $relativePath);
        Assert::string($res);

        return $res;
=======
<<<<<<< HEAD
        $res = module_path($moduleName, $relativePath);
        Assert::string($res);

            Assert::directory($res,'The path '.$res.' is not a directory ['.$moduleName.']['.$generatorPath.']');

            //File::makeDirectory($res, 0755, true, true);

        /*
        if (! file_exists($res)) {
            return;
        }
        */
        return $res;
<<<<<<< HEAD
=======
        return module_path($moduleName, $relativePath);
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    }
}
