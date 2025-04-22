<?php

declare(strict_types=1);

namespace Modules\Xot\Helpers;

use Illuminate\Support\Str;
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
use Webmozart\Assert\Assert;

use function Safe\glob;
use function Safe\error_log;
use function Safe\preg_match;
use function Safe\preg_replace;
use function Safe\file_get_contents;
use function Safe\file_put_contents;

class ResourceFormSchemaGenerator
{
    /**
     * @param class-string $resourceClass
     */
    public static function generateFormSchema(string $resourceClass): bool
    {
        try {
            if (!class_exists($resourceClass)) {
                throw new \RuntimeException("Class {$resourceClass} does not exist");
            }

            $reflection = new \ReflectionClass($resourceClass);
            $filename = $reflection->getFileName();

            if ($filename === false) {
                throw new \RuntimeException("Failed to get filename for class: {$resourceClass}");
            }

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======

class ResourceFormSchemaGenerator
{
    public static function generateFormSchema(string $resourceClass)
    {
        try {
            $reflection = new \ReflectionClass($resourceClass);
            $filename = $reflection->getFileName();

>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            // Read the file contents
            $fileContents = file_get_contents($filename);

            // Check if getFormSchema method already exists
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            if (strpos($fileContents, 'public function getFormSchema') !== false) {
                return false;
            }

            // Generate form schema
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
            if (false !== strpos($fileContents, 'public function getFormSchema')) {
                return false;
            }

            // Generate a basic form schema based on the class name
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            $modelName = str_replace('Resource', '', $reflection->getShortName());
            $modelVariable = Str::camel($modelName);

            $formSchemaMethod = "\n    public function getFormSchema(): array\n    {\n        return [\n";
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
            $formSchemaMethod .= "            Forms\\Components\\TextInput::make('{$modelVariable}_name')\n";
            $formSchemaMethod .= "                ->required(),\n";
            $formSchemaMethod .= "        ];\n    }\n";

            // Insert the method before the last closing brace
            $modifiedContents = preg_replace(
                '/}(\s*)$/',
                $formSchemaMethod.'}$1',
<<<<<<< HEAD
=======
=======

            // Try to generate some basic form fields
=======
>>>>>>> 4ab3760 (.)
            $formSchemaMethod .= "            Forms\\Components\\TextInput::make('{$modelVariable}_name')\n";
            $formSchemaMethod .= "                ->label('".Str::headline($modelName)." Name')\n";
            $formSchemaMethod .= "                ->required(),\n";
            $formSchemaMethod .= "        ];\n    }\n";

            // Detect if the class is in a Clusters directory
            $isInClustersDir = strpos($filename, 'Clusters') !== false;

            // Insert the method before the last closing brace
            $modifiedContents = preg_replace(
                '/}(\s*)$/',
                $formSchemaMethod.($isInClustersDir ? '' : '}$1'),
<<<<<<< HEAD
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
                $fileContents
            );

            // Write back to the file
            file_put_contents($filename, $modifiedContents);

            return true;
        } catch (\Exception $e) {
            error_log("Error generating form schema for {$resourceClass}: ".$e->getMessage());
<<<<<<< HEAD
=======
<<<<<<< HEAD
            error_log("Error generating form schema for {$resourceClass}: ".$e->getMessage());
=======
            // Log the error or handle it appropriately
            error_log("Error generating form schema for {$resourceClass}: ".$e->getMessage());

>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            return false;
        }
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    /**
     * @return array{updated: array<string>, skipped: array<string>}
     */
    public static function generateForAllResources(): array
    {
        $resourceFiles = glob('/var/www/html/base_orisbroker_fila3/laravel/Modules/*/app/Filament/Resources/*Resource.php');

        $results = ['updated' => [], 'skipped' => []];

        foreach ($resourceFiles as $file) {
            try {
                Assert::string($file);
                $content = file_get_contents($file);
                $namespaceMatch = [];
                $classMatch = [];

                if (preg_match('/namespace\s+([\w\\\\\\\\]+);/', $content, $namespaceMatch) &&
                    preg_match('/class\s+(\w+)\s+extends\s+XotBaseResource/', $content, $classMatch) &&
                    !empty($namespaceMatch[1]) && !empty($classMatch[1])) {
                    $fullClassName = $namespaceMatch[1].'\\'.$classMatch[1];

                    if (class_exists($fullClassName)) {
                        /** @var class-string $fullClassName */
                        if (self::generateFormSchema($fullClassName)) {
                            $results['updated'][] = $fullClassName;
                        }
                    }
                }
            } catch (\Exception $e) {
                $results['skipped'][] = is_string($file) ? $file : (string) $file.': '.$e->getMessage();
            }
        }

        return $results;
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
    public static function generateForAllResources()
    {
        $resourceFiles = glob('/var/www/html/base_techplanner_fila3/laravel/Modules/*/app/Filament/Resources/*Resource.php');

        $updatedResources = [];
        $skippedResources = [];

        foreach ($resourceFiles as $file) {
            // Get the full class name
            $content = file_get_contents($file);
            preg_match('/namespace\s+([\w\\\\]+);/', $content, $namespaceMatch);
            preg_match('/class\s+(\w+)\s+extends\s+XotBaseResource/', $content, $classMatch);

            if (! isset($namespaceMatch[1]) || ! isset($classMatch[1])) {
                $skippedResources[] = $file;

                continue;
            }

            $fullClassName = $namespaceMatch[1].'\\'.$classMatch[1];

            try {
                if (self::generateFormSchema($fullClassName)) {
                    $updatedResources[] = $fullClassName;
                }
            } catch (\Exception $e) {
                $skippedResources[] = $fullClassName.': '.$e->getMessage();
            }
        }

        return [
            'updated' => $updatedResources,
            'skipped' => $skippedResources,
        ];
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    }
}
