<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportItem extends Model
{
    protected $fillable = [
        'import_id',
        'product_id',
        'quantity'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
