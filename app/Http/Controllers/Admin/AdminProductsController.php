<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{ Product, Category,  User};
use Illuminate\Support\Facades\Auth;

class AdminProductsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->orderBy('id', 'DESC')->paginate(3);

        return view('admin.products.index', compact('products'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        $categories = Category::pluck('category_name', 'id');
       
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'  => 'required',
            'product_name'  => 'required|min:5'

        ]);
        // dd(request()->all());
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->price = $request->price; 
        $product->image('image', $product);

        if ($product->save()) {
            return redirect()->route('admin.products.index')->withSuccess('Votre annonce est ajoutée avec succès! di le développeur boco!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        
    return view('admin.products.show',compact( 'product'));
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
       
        return view('admin.products.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id'  => 'required'

        ]);

        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->qty = $request->qty;
        $product->is_active = 1;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image('image', $product);

        if ($product->save()) {
            return redirect()->route('admin.products.index')->withSecondary('Votre annonce est ajoutée avec succès! dit le développeur boco!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->delete()){
          
            return redirect()->route('admin.products.index')->withDanger('Votre annonce est supprimée avec succès! dit le développeur boco!');
        }
    }

}
