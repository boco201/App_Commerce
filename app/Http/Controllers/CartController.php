<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller
{

    public function addCart($id=null)
    {
       $product = Product::find($id);

        Cart::add($product->id, $product->product_name, 1, $product->price)->associate('App\Models\Product');
        return back();

        //$product = Product::find($id);

       // Cart::add($product->id, $product->product_name, 1, $product->price);

    }

    public function readCart()
    {
        $carts = Cart::content();
        
        return view('site.carts.read', compact('carts'));
    }

    public function updateCart()
    {
        Cart::update(request()->rowId,request()->qty);

        return back();
    }

    public function removeCart($rowId)
    {
        Cart::remove($rowId);

        return back();
    }
    //
}
