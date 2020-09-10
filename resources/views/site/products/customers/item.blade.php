@extends('site.order')

@section('content')
<div class="box">
        <div class="box-header">
        <h3 class="box-title" style="text-align:center">Item Information</h3>
       
       </div>

       <div class="box-body">
       <table class="table table-condensed">
      <tr style="background-color:tomato;color:#fff;height:50px;">
          <td>Order_Id</td>
          <td>Product_Id</td>
          <td>Color_Id</td>
          <td>Qty</td>
          <td>Price</td>
          <td>Amount</td>
          <td>Color</td>
          <td>Product_Name</td>
          <td>Product_image</td>
          <td>Created</td>
          <td>Last Update</td>
          <td>Valider</td>
      </tr>
      @foreach($items as $item)
      <tr>
          <td>{{ $item->order_id }} </td>
          <td>{{ $item->product_id }}</td>
          <td>{{ $item->color_id }}</td>
          <td>{{ $item->qty}}</td>
          <td>{{ $item->price }} €</td>
          <td>{{ $item->amount }} €</td>
          <td>{{ $item->color->color_name }}</td>
          <td>{{ $item->product->product_name}}</td>
          <td><img src="{{ asset('image/products/'.$item->product->image) }}" alt="" width="70" height="40"></td>
          <td>{{ $item->created_at }}</td>
          <td>{{ $item->updated_at }}</td>
      </tr>

      @endforeach
  
   </table>
     </div>
     <div class="container">
         <p>{{ $items->links() }}</p>

     </div>

@endsection
