<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\softDeletes;
//use Illuminate\Support\Str;

class Product extends Model
{
    use Notifiable;
    use softDeletes;

     protected $guarded = [];

     protected $dates = ['deleted_at'];
   
    
   /* public function path()
    {
        return url("/site/products/show/{$this->id}-".Str::slug($this->title));
    } */

    public function category()
    {
       return $this->belongsTo(Category::class);
    }
    
    public static function image($fileName,$product)
    {
       if (request()->hasfile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/products/', $filename);
            $product->image = $filename;
         }
    }

    public function orderItem()
    {
       return $this->hasMany(OrderItem::class);
    }

}

