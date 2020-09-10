@extends('site.app')
@section('title', 'Homepage')

@section('content')
<div class="container-fluid"><br>
<div class="row">
                <main class="col-sm-9">
                        <div class="card">
                            <table class="table table-hover shopping-cart-wrap">
                                <thead class="text-muted">
                                <tr>
                                    <th>Image</th>
                                    <th scope="col">Product</th>
                                    <th scope="col" width="120">Quantity</th>
                                    <th scope="col" width="120">Prix Unitaire</th>
                                    <th scope="col" class="text-right" width="200">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($carts as $cart)
                                    <tr>
                                      <td><img src="{{ asset('image/products/'.$cart->model->image) }}"  alt="" width="100" height="50"></td>
                                        <td>
                                            <figure class="media">
                                                <figcaption class="media-body">
                                                    <h6 class="title text-truncate">{{ $cart->model->product_name }}</h6>
                                                   
                                                </figcaption>
                                            </figure>
                                        </td>
                          
                                        <td>
                                        <div class="price-wrap">
                                            {{---------------------Select qty---------------------}}
                                            <form action="{{ route('cart.update') }}" method="post" id="frm_update{{$cart->rowId}}">
                                                @csrf 
                                                <input type="hidden" name="rowId" value="{{ $cart->rowId}}">
                                                <select class="from-control" name="qty" onChange="document.getElementById('frm_update{{$cart->rowId}}').submit();" style="border-radius:none;border:none; background-color:transparent;font-weight:bold">
                                                @for($i=1; $i<=100; $i++)
                                                <option value="{{ $i }}" {{ $i==$cart->qty ? 'selected' : null}}>{{$i}}</option>
                                                @endfor
                                               </select>
                                                
                                            </div>
                                            </form>
                                            {{----------------------endselect----------------------}}
                                        </td>

                                         <td>
                                            <div class="price-wrap">
            
                                            <var class="price h3 text-success">
                                                <span class="num" id="productPrice">{{ $cart->total }} €</span>
                                            </var>

                                            </div>
                                        </td>

                                        <td class="text-right">
                                            <a href="{{ route('cart.remove', $cart->rowId) }}" class="btn btn-outline-danger"><i class="fa fa-times"></i> </a>
                                        </td>
              
                                    </tr>
                               
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                </main>

<aside class="col-sm-3">

<p class="alert alert-success">Add USD 5.00 of eligible items to your order to qualify for FREE Shipping. </p>

<dl class="dlist-align h6">
    <dt>SubTotal:</dt>
    <dd class="text-right"><strong>{{ Cart::subtotal() }} €</strong></dd>
</dl>
<hr>

<dl class="dlist-align h6">
    <dt>TVA:</dt>
    <dd class="text-right"><strong>{{ Cart::tax() }} €</strong></dd>
</dl>

<hr>
<dl class="dlist-align h6">
    <dt>Total:</dt>
    <dd class="text-right"><strong>{{ Cart::total() }} €</strong></dd>
</dl>
 
<figure class="itemside mb-3">
      
    <aside class="aside"><img src="{{ asset('frontend/images/icons/pay-visa.png') }}"></aside>
    <div class="text-wrap small text-muted">
        Pay 84.78 AED ( Save 14.97 AED ) By using ADCB Cards
    </div>
</figure>
<figure class="itemside mb-3">
    <aside class="aside"> <img src="{{ asset('frontend/images/icons/pay-mastercard.png') }}"> </aside>
    <div class="text-wrap small text-muted">
        Pay by MasterCard and Save 40%.
        <br> Lorem ipsum dolor
    </div>
</figure>
<a href="{{ route ('site.checkouts.index') }}" class="btn btn-success btn-lg btn-block">Checkout</a>
</aside>
                
            </div>
        </div>
</div><br>
@endsection