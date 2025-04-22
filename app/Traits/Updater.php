<?php

declare(strict_types=1);

namespace Modules\Xot\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

/**
 * Trait Updater.
 * https://dev.to/hasanmn/automatically-update-createdby-and-updatedby-in-laravel-using-bootable-traits-28g9.
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
 *
 * @property int|null $created_by ID dell'utente che ha creato il record
 * @property int|null $updated_by ID dell'utente che ha aggiornato il record
 * @property int|null $deleted_by ID dell'utente che ha eliminato il record
 * @property-read \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property-read \Modules\Xot\Contracts\ProfileContract|null $updater
 * @property-read \Modules\Xot\Contracts\ProfileContract|null $deleter
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
 */
trait Updater
{
    /**
     * Summary of creator.
     *
     * @return BelongsTo<ProfileContract&Model, static>
     */
    public function creator(): BelongsTo
    {
        /** @var class-string<ProfileContract&Model> $profileClass */
        $profileClass = XotData::make()->getProfileClass();

        // @phpstan-ignore return.type
        return $this->belongsTo(
            $profileClass,
            'created_by',
            'user_id'
        );
    }

    /**
     * Get the last user who updated the model.
     *
     * @return BelongsTo<ProfileContract&Model, static>
     */
    public function updater(): BelongsTo
    {
        /** @var class-string<ProfileContract&Model> $profileClass */
        $profileClass = XotData::make()->getProfileClass();

        // @phpstan-ignore return.type
        return $this->belongsTo(
            $profileClass,
            'updated_by',
            'user_id'
        );
    }

    /**
     * bootUpdater function.
     */
    protected static function bootUpdater(): void
    {
        static::creating(
            static function (Model $model): void {
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
                Assert::isArray($attributes = $model->getAttributes());

                if (array_key_exists('created_by', $attributes)) {
                    $model->setAttribute('created_by', authId());
                }

                if (array_key_exists('updated_by', $attributes)) {
                    $model->setAttribute('updated_by', authId());
                }
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
                // @phpstan-ignore property.notFound
                $model->created_by = authId();
                // @phpstan-ignore property.notFound
                $model->updated_by = authId();
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            }
        );

        static::updating(
            static function (Model $model): void {
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
                Assert::isArray($attributes = $model->getAttributes());

                if (array_key_exists('updated_by', $attributes)) {
                    $model->setAttribute('updated_by', authId());
                }
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
                // @phpstan-ignore property.notFound
                $model->updated_by = authId();
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            }
        );
        /*
         * Deleting a model is slightly different than creating or deleting.
         * For deletes we need to save the model first with the deleted_by field
         */
        static::deleting(
            static function (Model $model): void {
                Assert::isArray($attributes = $model->attributes);

                if (\in_array('deleted_by', array_keys($attributes), false)) {
                    $model->setAttribute('deleted_by', authId());
<<<<<<< HEAD
=======
<<<<<<< HEAD
                    $model->setAttribute('deleted_by', authId());
=======
                    $model->update(['deleted_by' => authId()]);
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
                }
            }
        );
    }
}// end trait Updater
