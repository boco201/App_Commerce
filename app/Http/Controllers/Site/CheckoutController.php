<?php

namespace App\Http\Controllers\Site;

use Cart;
use Illuminate\Http\Request;
use App\Models\{ Order, OrderItem, Product, Payment};
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::content();

        return view('site.checkouts.index', compact('carts'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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


        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));
   
            $customer = Customer::create(array(
           'receipt_email' => $request->stripeEmail,
           'source' => $request->stripeToken
       ));
   
       $charge = Charge::create(array(
           'customer' => $customer->id,
           'amount' =>  Cart::total() * 100,
           'currency' => 'eur'
          
       ));
   
   
     } catch (\Exception $ex) {
       return $ex->getMessage();
   
   }

  if ($charge) {
//----------------payement method-----------------//
   $payment = new Payment();
   $payment->id = $charge['id'];
   $payment->amount = $charge['amount'] / 100;
   $payment->postal_code = $charge['billing_details']['address']['postal_code'];
   $payment->currency = $charge['currency'];
   $payment->payment_method = $charge['payment_method'];
   $payment->name = $charge['name'];
   $payment->receipt_url = $charge['receipt_url'];
   $payment->status = $charge['status'];
//------------------end payment--------------------//
   if ($payment->save()) {

//-----------------------order method-----------------//
       $order = new Order();
       $order->user_id = auth()->user()->id; 
       $order->grand_total = Cart::total();
       $order->payment_id = $payment->id;
       $order->status_id = 1;
       $order->first_name  = $request->first_name;
       $order->last_name  = $request->last_name;
       $order->address  = $request->address;
       $order->city  = $request->city;
       $order->country  = $request->country;
       $order->post_code  = $request->post_code;
       $order->phone_number  = $request->phone_number;
       $order->notes  = $request->notes;
//------------------------End Order---------------------//

//-----------------------Item Method-------------------//
       if ($order->save()) {
           foreach(Cart::content() as $key => $cart){
               $item = new OrderItem();
               $item->order_id = $order->id;
               $item->product_id = $cart->id;
               $item->color_id = 1;
               $item->price = $cart->price;
               $item->qty = $cart->qty;
               $item->amount = $cart->total;
               $item->save();
         //--------------End Method-------------//  
            Cart::destroy();
           }
       }
      
       return back()->withSuccess('Votre payement est accepté');

    }

   }
       
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
