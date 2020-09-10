<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Color extends Model
{
    use softDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function product_colors()
    {
        return $this->hasMany(ProductColor::class);
    }
    public function items()
    {
       return $this->hasMany(OrderItem::class);
    }

    //
}
