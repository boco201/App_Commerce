<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Category extends Model
{
    use softDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];


    public static function image($fileName,$category)
    {
       if (request()->hasfile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/categories/', $filename);
            $category->image = $filename;
         }
    }
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    //
}
