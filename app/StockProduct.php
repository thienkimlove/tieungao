<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockProduct extends Model
{
    protected $fillable = ['product_id', 'in_stock'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
