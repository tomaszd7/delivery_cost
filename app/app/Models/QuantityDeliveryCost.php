<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\QuantityDeliveryCost
 *
 * @property int $id
 * @property int|null $client_id
 * @property string|null $client_group
 * @property string|null $payment
 * @property float $quantity_from
 * @property float $quantity_to
 * @property float $cost
 * @property-read \App\Models\Client|null $client
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuantityDeliveryCost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuantityDeliveryCost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuantityDeliveryCost query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuantityDeliveryCost whereClientGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuantityDeliveryCost whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuantityDeliveryCost whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuantityDeliveryCost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuantityDeliveryCost wherePayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuantityDeliveryCost whereQuantityFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuantityDeliveryCost whereQuantityTo($value)
 * @mixin \Eloquent
 */
class QuantityDeliveryCost extends Model
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
