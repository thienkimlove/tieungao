<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'supplier_id',
        'sell_price',
        'promotion_price',
        'sell_vat',
        'desc',
        'detail',
        'keyword',
        'image',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'image6',
        'status',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
