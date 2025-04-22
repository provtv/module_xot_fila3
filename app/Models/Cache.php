<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

/**
 * Modules\Xot\Models\Cache.
 *
 * @property string $key
 * @property string $value
 * @property int    $expiration
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
 *
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
 * @method static \Modules\Xot\Database\Factories\CacheFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Cache  newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cache  newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cache  query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cache  whereExpiration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cache  whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cache  whereValue($value)
<<<<<<< HEAD
 * @property int $expiration
=======
<<<<<<< HEAD
 * @property int $expiration
=======
 *
 * @property int $expiration
 *
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
 * @method static \Modules\Xot\Database\Factories\CacheFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Cache  newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cache  newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cache  query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cache  whereExpiration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cache  whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cache  whereValue($value)
<<<<<<< HEAD
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
=======
<<<<<<< HEAD
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
=======
 *
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 *
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
 * @mixin \Eloquent
 */
class Cache extends BaseModel
{
    protected $table = 'cache';

    protected $primaryKey = 'key';

    protected $keyType = 'string';

    /** @var list<string> */
    protected $fillable = [
        'key',
        'value',
        'expiration',
    ];
}
