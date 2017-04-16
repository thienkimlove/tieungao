<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'status',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
