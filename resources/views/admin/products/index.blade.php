@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')


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

@if (session()->has('danger'))
        <div class="alert alert-danger">
            {{ session()->get('danger') }}        
        </div>
@endif

@if (session()->has('secondary'))
        <div class="alert alert-secondary">
            {{ session()->get('secondary') }}        
        </div>
@endif

    <div class="box">
        <div class="box-header">
        <h3 class="box-title" style="text-align:center">Category Information</h3>
        <p style="text-align:right; margin-right:30px;"><a href="{{ route('admin.products.create') }}" class="btn btn-primary">Nouvelle produit</a></p>
 
       </div>

       <div class="box-body">
       <table class="table table-condensed">
      <tr style="background-color:tomato;color:#fff;height:50px;">
          <td>#</td>
          <td>Category_id</td>
          <td>Name</td>
          <td>Description</td>
          <td>Active</td>
          <td>Code</td>
          <td>Qty</td>
          <td>Prix</td>
          <td>Created</td>
          <td>Last Update</td>
          <td>Image</td>
          <td>Editer</td>
          <td>Supprimer</td>
      </tr>
      @foreach($products as $key =>$product)
      <tr>
          <td>{{ ++$key }} </td>
          <td>{{ $product->category->category_name }}</td>
          <td><a href="{{ route('admin.products.show', $product->id) }}"> {{ $product->product_name }}</a></td>
          <td>{{ str_limit($product->description, 50) }}</td>
          <td>{{ $product->is_active }}</td>
          <td>{{ $product->product_code}}</td>
          <td>{{ $product->qty}}</td>
          <td>{{ $product->price}}</td>
          <td>{{ $product->created_at }}</td>
          <td>{{ $product->updated_at }}</td>
          <td>
              <img src="{{ asset('image/products/'.$product->image) }}" alt="" width="80" height="50">
          </td>
          <td><a href="{{ route('admin.products.edit', $product->id)}}" class="btn btn-secondary">Editer</a> </td>
          <td> 
          <form action="{{ route('admin.products.destroy', $product->id)}}"  method="POST" enctype="multipart/form-data">
              @csrf 
              @method('DELETE')

              <button type="submit" class="btn btn-danger">Supprimer</button>
          </form>
        </td>
          <td></td>
      </tr>

      @endforeach
  
   </table>
     </div>
     <div class="container">
         <p>{{ $products->links() }}</p>
     </div>

@endsection