<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Tree;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\Xot\Contracts\HasRecursiveRelationshipsContract;
use Spatie\QueueableAction\QueueableAction;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Collection;

class GetTreeOptionsByModelClassAction
{
    use QueueableAction;

    /** @var array<int|string, string> */
    public array $options = [];

    /**
     * @param class-string<HasRecursiveRelationshipsContract> $class
     *
     * @return array<int|string, string>
     */
    public function execute(string $class, Model|callable|null $where = null): array
    {
        /** @var HasRecursiveRelationshipsContract $model */
        $model = new $class();

        /** @var Collection<int, HasRecursiveRelationshipsContract> $collection */
        // @phpstan-ignore generics.notSubtype
        $collection = $model->newQuery()->get();
        $rows = $collection->toTree();

        foreach ($rows as $row) {
            /* @var HasRecursiveRelationshipsContract $row */
            $this->options[$row->getKey()] = is_string($row) ? $row : (string) $row->getLabel();
<<<<<<< HEAD
=======
<<<<<<< HEAD
            $this->options[$row->getKey()] = is_string($row) ? $row : (string) $row->getLabel();
=======
            $this->options[$row->getKey()] = (string) $row->getLabel();
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            $this->parse($row);
        }

        return $this->options;
    }

    public function parse(HasRecursiveRelationshipsContract $model): void
    {
        foreach ($model->children as $child) {
            $this->options[$child->getKey()] = Str::repeat('---', $child->depth).'   '.$child->getLabel();
        }
    }
}
