<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{ Color, Statuse, Payment, Order, OrderItem }; 

class AdminManagerStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexColor()
    {
        $colors = Color::all();

        return view('admin.managers.colors.index', compact('colors'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createColor()
    {

        return view('admin.managers.colors.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeColor(Request $request)
    {
        if (Color::create(request()->all())) {
            
            return redirect()->route('admin.managers.colors.index')->withSuccess('Votre couleur est ajoutée avec succès!');
        }

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editColor($id)
    {
        return view('admin.managers.colors.edit');
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateColor(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyColor($id)
    {
        if (Color::destroy($id)) {
            return redirect()->route('admin.managers.colors.index')->withDanger('Votre couleur est supprimée avec succès!');
        }
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restaureColor()
    {
       
        return view('admin.managers.colors.restaurecolor');
        //
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexStatus()
    {
        $colors = Statuse::all();
        
        return view('admin.managers.status.index', compact('colors'));
        //
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStatus()
    {

        return view('admin.managers.status.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStatus(Request $request)
    {
        if (Statuse::create(request()->all())) {
            
            return redirect()->route('admin.managers.status.index')->withSuccess('Votre status est ajoutée avec succès!');
        }

        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editStatus($id)
    {

        return view('admin.managers.status.edit');
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyStatus($id)
    {
        if (Statuse::destroy($id)) {
            return redirect()->route('admin.managers.status.index')->withDanger('Votre status est supprimée avec succès!');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Order()
    {
       $items = OrderItem::with('order')->orderBy('id', 'DESC')->paginate(2);

      return view('admin.products.customers.order', compact('items'));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function OrderItem()
    {
       $items = OrderItem::with('order')->orderBy('id', 'DESC')->paginate(2);

      return view('admin.products.customers.item', compact('items'));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Payment()
    {
       $payments = Payment::orderBy('id', 'desc')->paginate(2);

      return view('admin.products.customers.payment', compact('payments'));
    }



}
