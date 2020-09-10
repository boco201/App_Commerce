@extends('admin.app')

@section('content')
<div class="box">
        <div class="box-header">
        <h3 class="box-title" style="text-align:center">Order Information</h3>
       
       </div>

       <div class="box-body">
       <table class="table table-condensed">
      <tr style="background-color:tomato;color:#fff;height:50px;">
          <td>#</td>
          <td>Amount</td>
          <td>Payment_id</td>
          <td>Status_id</td>
          <td>Product_id</td>
          <td>Color_id</td>
          <td>Qty</td>
          <td>Name</td>
          <td>userName</td>
          <td>Phone</td>
          <td>Address</td>
          <td>City</td>
          <td>Postal Code</td>
          <td>Country</td>
          <td>Created</td>
          <td>Last Update</td>
          <td>Valider</td>
      </tr>
      @foreach($items as $item)
      <tr>
          <td>{{ $item->order->id }} </td>
          <td>{{ $item->order->grand_total }}</td>
          <td>{{ $item->order->payment_id }}</td>
          <td>{{ $item->order->status_id }}</td>
          <td>{{ $item->product_id }}</td>
          <td>{{ $item->color_id }}</td>
          <td>{{ $item->qty }}</td>
          <td>{{ $item->order->first_name }}</td>
          <td>{{ $item->order->last_name}}</td>
          <td>{{ $item->order->phone_number}}</td>
          <td>{{ $item->order->address }}</td>
          <td>{{ $item->order->city }}</td>
          <td>{{ $item->order->post_code }}</td>
          <td>{{ $item->order->country }}</td>
          <td>{{ $item->order->created_at }}</td>
          <td>{{ $item->order->updated_at }}</td>
         
          <td class="btn btn-primary"><div class="col-md-12">
<div class="form-group">
 <label for="is_active"> </label>
 <input type="checkbox" name="is_active" id="is_active" {{ $item->order->is_active!=0? 'checked': null }}  value="{{ $item->order->is_active }}">
</div>
</div>
</td>
      </tr>

      @endforeach
  
   </table>
     </div>
     <div class="container">
         <p>{{ $items->links() }}</p>

     </div>

@endsection



