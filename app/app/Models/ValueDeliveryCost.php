<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ValueDeliveryCost
 *
 * @property int $id
 * @property int|null $client_id
 * @property string|null $client_group
 * @property string|null $payment
 * @property float $value_from
 * @property float $value_to
 * @property float $cost
 * @property-read \App\Models\Client|null $client
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ValueDeliveryCost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ValueDeliveryCost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ValueDeliveryCost query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ValueDeliveryCost whereClientGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ValueDeliveryCost whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ValueDeliveryCost whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ValueDeliveryCost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ValueDeliveryCost wherePayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ValueDeliveryCost whereValueFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ValueDeliveryCost whereValueTo($value)
 * @mixin \Eloquent
 */
class ValueDeliveryCost extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function client()
    {
        return $this->belongsTo('App\Models\Client')->withDefault();
    }
}
