@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
<div class="container mt-4">
    <div class="row">

    <div class="col-md-8" >
    <img src="{{ asset('image/products/'.$product->image) }}" alt="" width="750" height="500">
         </div>
            
         <div class="col-md-4">
          <ul class="list-group">
              <li class="list-group-item"><h3><a href="{{ route('admin.products.index')}}">{{ $product->product_name }}</a></h3></li>
              <li class="list-group-item"><span style="font-size:1.3rem;">Prix: </span><span style="font-size:1.3rem;color:red;font-weight:bold;">{{ $product->price}} €</span></li>
              <li class="list-group-item">Category: {{ $product->category->category_name }}</li>
              <li class="list-group-item"><span style="color:red;font-weight:bold;">Produit ajouté, il y a {{ $product->created_at->diffForHumans() }}</span></li>
              <li class="list-group-item"></li>
          </ul><br>

     </div>
        <div class="col-md-12"><br>
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action ">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1" class="mb-1" style="color:red;"> Description</h5>
              <small style="color:red;font-weight:bold;">{{ $product->created_at->diffForHumans() }}</small>
            </div>
            <p >{{ $product->description }}.</p>
            <small>Donec id elit non mi porta.</small>
          </a>
        </div>
        </div>
    </div>
</div><br>

@endsection

