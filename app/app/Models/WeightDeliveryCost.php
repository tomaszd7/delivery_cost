<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\WeightDeliveryCost
 *
 * @property int $id
 * @property int|null $client_id
 * @property string|null $client_group
 * @property string|null $payment
 * @property float $weight_from
 * @property float $weight_to
 * @property float $cost
 * @property-read \App\Models\Client|null $client
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WeightDeliveryCost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WeightDeliveryCost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WeightDeliveryCost query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WeightDeliveryCost whereClientGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WeightDeliveryCost whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WeightDeliveryCost whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WeightDeliveryCost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WeightDeliveryCost wherePayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WeightDeliveryCost whereWeightFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WeightDeliveryCost whereWeightTo($value)
 * @mixin \Eloquent
 */
class WeightDeliveryCost extends Model
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
