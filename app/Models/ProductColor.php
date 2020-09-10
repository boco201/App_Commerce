<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class ProductColor extends Model
{
    use softDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function product()
    {
       return $this->belongsTo(Product::class);
    }

    public function color()
    {
       return $this->belongsTo(Color::class);
    }


    //
}
