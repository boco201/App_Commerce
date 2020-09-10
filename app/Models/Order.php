<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Order extends Model
{
    use softDeletes;
	 protected $table = 'orders';

     protected $guarded = [];
     protected $dates = ['deleted_at'];

    /* public function user()
      {
         return $this->belongsTo(User::class, 'user_id');
      }  */

    public function orderItem()
      {
         return $this->hasMany(OrderItem::class);
      }

      public function payment()
      {
         return $this->belongsTo(Payment::class);
      }

      public function status()
      {
         return $this->belongsTo(Statuse::class);
      }

      public function user()
      {
         $id = auth()->user()->id;

         return $this->belongsTo("App\Models\User")->where('id',$id);
      }

}


