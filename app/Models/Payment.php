<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Payment extends Model
{
    use softDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];
    protected $with = 'order';
    protected $primaryKey = 'id';
    public $incrementing = false;

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    //
}
