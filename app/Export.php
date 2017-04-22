<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    protected $fillable = [
        'order_id',
        'user_id',
        'note',
        'status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }


}
