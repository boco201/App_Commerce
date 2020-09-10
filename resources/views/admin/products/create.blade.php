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


	<h1>Ajouter un produit</h1>
	<form method="post" action="{{ route('admin.products.store')}}" enctype="multipart/form-data">
   @csrf
 

<div class="row">

<div class="col-md-6">
<div class="form-group">
   <h5 style="font-weight: bold;color: #000;font-style: italic;"><label for="category_id">Category * : </label></h5>
   <select name="category_id" id="category_id" class="form-control">
   <option value=""><-----------------------------------------Select Catégory-------------------------------------></option>
       @foreach($categories as $key => $category)
        <option value="{{ $key }}">{{ $category }}</option>
        @endforeach
     </select>
  </div>
</div>

<div class="col-md-6">
<div class="form-group">
 <label for="product_name">Titre: </label>
 <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Ajouter un titre" value="{{old('product_name')}}">
</diV>
</div>

<div class="col-md-6">
<div class="form-group">
 <label for="product_code">Code: </label>
 <input type="text" name="product_code" id="product_code" class="form-control" placeholder="Ajouter une code" value="{{old('product_code')}}">
</diV>
</div>

<div class="col-md-6">
<div class="form-group">
 <label for="qty">Quantité: </label>
 <input type="text" name="qty" id="qty" class="form-control" placeholder="Ajouter une qty" value="{{old('qty')}}">
</diV>
</div>


<div class="col-md-6">
<div class="form-group">
 <label for="price">Prix: </label>
 <input type="text" name="price" id="price" class="form-control" placeholder="Ajouter un prix" value="{{old('price')}}" required>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
 <label for="description">Description: </label>
 <textarea name="description" class="form-control" rows="7" cols="2" placeholder="Description facultatif"></textarea>
</div>
</div>


<div class="col-md-4">
<div class="form-group">
 <label for="image">Upload une image 1 </label><br>
 <input type="file" name="image" id="image" class="btn btn-primary" placeholder="Ajouter une image" value="{{old('image')}}" >
</div>
</div>


</div>

<div class="form-group">
 <button type="submit" class="btn btn-success">Ajouter un produit</button>

</div>
</form>
</div>
</div>

@endsection




