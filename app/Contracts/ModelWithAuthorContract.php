<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Modules\Xot\Contracts\ModelWithAuthorContract.
 *
 * @property int                $id
 * @property int|null           $user_id
 * @property string|null        $post_type
 * @property Carbon|null        $created_at
 * @property Carbon|null        $updated_at
 * @property string|null        $created_by
 * @property string|null        $updated_by
 * @property string|null        $title
 * @property PivotContract|null $pivot
 * @property string $tennant_name
<<<<<<< HEAD
=======
<<<<<<< HEAD
 * @property string $tennant_name
=======
 * @property string             $tennant_name
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
 * @property int|null           $author_id
 * @property UserContract|null  $user
 * @property UserContract|null  $author
 *
 * @method mixed     getKey()
 * @method string    getRouteKey()
 * @method string    getRouteKeyName()
 * @method string    getTable()
 * @method mixed     with($array)
 * @method array     getFillable()
 * @method mixed     fill($array)
 * @method mixed     getConnection()
 * @method mixed     update($params)
 * @method mixed     delete()
 * @method mixed     detach($params)
 * @method mixed     attach($params)
 * @method mixed     save($params)
 * @method array     treeLabel()
 * @method array     treeSons()
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
 * @method int       treeSonsCount()
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
 * @method int       treeSonsCount()
>>>>>>> 50bb41c (fix: auto resolve conflict)
 * @method array     toArray()
 * @method BelongsTo user()
 *
 * @phpstan-require-extends Model
 *
 * @mixin \Eloquent
 */
<<<<<<< HEAD
<<<<<<< HEAD
interface ModelWithAuthorContract {}
=======
<<<<<<< HEAD
interface ModelWithAuthorContract {}
=======
interface ModelWithAuthorContract
{
}
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
interface ModelWithAuthorContract
{
}
>>>>>>> 50bb41c (fix: auto resolve conflict)
