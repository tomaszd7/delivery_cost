<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrderLine
 *
 * @property int $id
 * @property int $product_id
 * @property int $order_id
 * @property int $quantity
 * @property float $price
 * @property-read \App\Models\Client $order
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderLine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderLine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderLine query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderLine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderLine whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderLine wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderLine whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderLine whereQuantity($value)
 * @mixin \Eloquent
 */
class OrderLine extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function product() {
        return $this->belongsTo('App\Models\Product');
    }

    public function order() {
        return $this->belongsTo('App\Models\Client');
    }
}
