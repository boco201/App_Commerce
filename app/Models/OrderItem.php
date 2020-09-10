<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class OrderItem extends Model
{
    use softDeletes;
      protected $table = 'order_items';

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function order()
    {
      return $this->belongsTo(Order::class);
    }

    public function color()
    {
      return $this->belongsTo(Color::class);
    }

    public function product()
    {
      return $this->belongsTo(Product::class);
    }


}
