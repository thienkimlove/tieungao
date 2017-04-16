<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    protected $fillable = [
        'export_id',
        'user_id',
        'note',
        'status'
    ];
}
