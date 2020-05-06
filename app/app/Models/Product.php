<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property float|null $weight
 * @property int $calculate_value_cost
 * @property int $calculate_weight_cost
 * @property int $calculate_quantity_cost
 * @property float|null $cost_per_piece
 * @property float|null $flat_cost
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCalculateQuantityCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCalculateValueCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCalculateWeightCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCostPerPiece($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereFlatCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereWeight($value)
 * @mixin \Eloquent
 * @property int $calculate_individual_cost
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCalculateIndividualCost($value)
 */
class Product extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

}
