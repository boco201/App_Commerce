@extends('site.app')
@section('title', 'Homepage')

@section('content')
<div class="container-fluid">
    <h1 id="page" class="titre_principale">Homepage</h1>
   
    <div class="row">
    @foreach($products as $key => $product)

    <div class="col s12 m3">
    <form action="{{ route('cart.add', $product->id) }}" method="GET">
      <div class="card">
        <div class="card-image">
          <img src="{{ asset('image/products/'.$product->image) }}">
          <span class="card-title"><a href=""> {{ $product->product_name }} </a> </span>
        </div>
        <div class="card-content">
          <p>{{ str_limit($product->description, 100) }}</p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a> <a href="#">&#8377; {{ $product->price }} €</a> <span>% off</span>
          <h6 class="badge badge-success">4.4 <i class="fa fa-star"></i></h6>
        </div>

        <div class="card-action">
        <button type="submit" class="btn btn-primary">Add To Cart<i class="fa fa-shopping-cart"></i></button>
        </div>
      </div>
      </form>
    </div>
@endforeach
  </div>
</div>

<div class="container">
    <p>{{ $products->links()}}</p>
</div>

            
@endsection
