@extends('site.order')

@section('content')
<div class="box">
        <div class="box-header">
        <h3 class="box-title" style="text-align:center">Order Information</h3>
       
       </div>

       <div class="box-body">
       <table class="table table-condensed">
      <tr style="background-color:tomato;color:#fff;height:50px;">
          <td>N° de Commande</td>
          <td>Payment Id</td>
          <td>Status</td>
          <td>Total</td>
          <td>Created</td>
          <td>Last Update</td>
          <td>Invoice</td>
          <td>Détails</td>
      </tr>
      @foreach($orders as $key => $order)
      <tr>
          <td>{{ $order->id }} </td>
          <td>{{ $order->payment->id }}</td>
          <td><span class="btn btn-{{ $order->status->class }} btn-sm">{{ $order->status->status}}</span></td>
          <td>{{ number_format($order->payment->amount, 2) }} €</td>
          <td>{{ $order->created_at }}</td>
          <td>{{ $order->updated_at }}</td>
          <td><a href="{{ $order->payment->receipt_url}}" target="_blank">print</a></td>
          <td>
              <button class="btn btn-primary btn-xs accordion-toggle" data-toggle="collapse" data-target="#demo{{$key}}">
                 <span class="glyphicon glyphicon-eye-open"></span>
              </button>
          </td>
         
      </tr>

      <tr class="accordion-body collapse" id="demo{{ $key }}">
        <td colspan="8">
               <table class="table table-bordered">
                  <thead class="text-danger">
                    <tr>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th>Image</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($order->orderItem as $item)
                     <tr>
                         <td>{{ $item->product->product_name }}</td>
                         <td>{{ $item->qty }}</td>
                         <td>{{ $item->product->price }}</td>
                         <td>{{ $item->amount }}</td>
                         <td><img src="{{ asset('image/products/'.$item->product->image) }}" alt="" width="60" height="40"></td>
                     </tr>
                     @endforeach
                  </tbody>
           </table>
           </td>
      </tr>

      @endforeach
  
   </table>
     </div>
    

@endsection



