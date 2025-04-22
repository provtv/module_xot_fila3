<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

/**
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
 * 
 *
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
<<<<<<< HEAD
=======
=======
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 *
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
 * @method static \Modules\Xot\Database\Factories\PulseEntryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry  newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry  newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry  query()
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
 * @property int         $id
 * @property int         $timestamp
 * @property string $type
 * @property string $key
 * @property string|null $key_hash
 * @property int|null    $value
<<<<<<< HEAD
=======
=======
 *
 * @property int         $id
 * @property int         $timestamp
 * @property string      $type
 * @property string      $key
 * @property string|null $key_hash
 * @property int|null    $value
 *
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry whereKeyHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry whereTimestamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry whereValue($value)
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
 *
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
 * @mixin \Eloquent
 */
class PulseEntry extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'type',
        'key',
        'value',
    ];
}
