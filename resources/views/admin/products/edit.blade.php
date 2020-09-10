@extends('admin.app')

@section('content')
<div class="container mt-4">
@if (count($errors) > 0)
      <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.
          <ul>
             @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
                </ul>
            </div>
 @endif

 @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}        
        </div>
@endif

@if (session()->has('secondary'))
        <div class="alert alert-secondary">
            {{ session()->get('secondary') }}        
        </div>
@endif



	<h1>Editer un produit</h1>
	<form method="post" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
   @csrf
   @method('PATCH')
 

<div class="row">

<div class="col-md-6">
<div class="form-group">
   <h5 style="font-weight: bold;color: #000;font-style: italic;"><label for="category_id">Category * : </label></h5>
   <select name="category_id" id="category_id" class="form-control">
       @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
        @endforeach
     </select>
  </div>
</div>

<div class="col-md-6">
<div class="form-group">
 <label for="product_name">Titre: </label>
 <input type="text" name="product_name" id="product_name" class="form-control"  value="{{ $product->product_name }}">
</diV>
</div>

<div class="col-md-6">
<div class="form-group">
 <label for="product_code">Code: </label>
 <input type="text" name="product_code" id="product_code" class="form-control" value="{{ $product->product_code }}">
</diV>
</div>

<div class="col-md-6">
<div class="form-group">
 <label for="qty">Quantité: </label>
 <input type="text" name="qty" id="qty" class="form-control"  value="{{ $product->qty }}">
</diV>
</div>


<div class="col-md-6">
<div class="form-group">
 <label for="price">Prix: </label>
 <input type="text" name="price" id="price" class="form-control"  value="{{ $product->price }}" required>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
 <label for="description">Description: </label>
 <textarea name="description" class="form-control" rows="7" cols="2">{{ $product->description }}</textarea>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
 <label for="is_active">Active: </label>
 <input type="checkbox" name="is_active" id="is_active" {{$product->is_active!=0? 'checked': null }}  value="{{ $product->is_active }}">
</div>
</div>


<div class="col-md-4">
<div class="form-group">
<label for="image">Upload une image </label><br>
   <img src="{{ asset('image/products/'.$product->image )}}" class="img-thumbnail" width="100" />
   <input type="file" name="image" value="{{ $product->image }}" />
</div>
</div>


</div>

<div class="form-group">
 <button type="submit" class="btn btn-secondary">Editer un produit</button>

</div>
</form>
</div>
</div>

@endsection

