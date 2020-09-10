<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $categories = Category::orderBy('id', 'DESC')->paginate(1);

        return view('admin.categories.index', compact('categories'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
        //
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
            'category_name' => 'required|min:5',
            'description' => 'required|min:5|max:1000'

        ]);
        // dd(request()->all());
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->description = $request->description;
        $category->is_active = 1;
        $category->image('image', $category);

        if ($category->save()) {
            return redirect()->route('admin.categories.index')->withSuccess('Votre categorie est ajoutée avec succès! di le développeur boco!');
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->category_name = $request->category_name;
        $category->description = $request->description;
        $category->is_active = 1;
        $category->image('image', $category);

        if ($category->save()) {
            return redirect()->route('admin.categories.index')->withSecondary('Votre categorie est ajoutée avec succès! di le développeur boco!');
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
       
        $category->delete();

          return redirect()->route('admin.categories.index')->withDanger('Votre categorie est supprimée avec succès');
       
        //
    }
}
