<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'billing_name',
        'billing_address',
        'billing_district',
        'billing_province',
        'billing_phone',
        'billing_email',

        'shipping_name',
        'shipping_address',
        'shipping_district',
        'shipping_province',
        'shipping_phone',
        'shipping_email',

        'customer_note',
        'status'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
