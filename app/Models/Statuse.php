<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Statuse extends Model
{
    use softDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
