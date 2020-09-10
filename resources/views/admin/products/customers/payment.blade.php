@extends('admin.app')

@section('content')
    <div class="box">
        <div class="box-header">
        <h3 class="box-title" style="text-align:center">Payment Information</h3>
       
       </div>

       <div class="box-body">
       <table class="table table-condensed">
      <tr style="background-color:tomato;color:#fff;height:50px;">
          <td>Id</td>
          <td>Amount</td>
          <td>Currency</td>
          <td>Status</td>
          <td>Payment_Method</td>
          <td>Receipt_Url</td>
          <td>Created</td>
          <td>Last Update</td>
      </tr>
      @foreach($payments as $payment)
      <tr>
          <td>{{ $payment->id }} </td>
          <td>{{ $payment->amount }}</td>
          <td>{{ $payment->currency }}</td>
          <td>{{ $payment->status }}</td>
          <td>{{ $payment->payment_method }}</td>
          <td>{{ $payment->receipt_url }}</td>
          <td>{{ $payment->created_at}}</td>
          <td>{{ $payment->updated_at }}</td> 
      </tr>

      @endforeach
  
   </table>
     </div>
     <div class="container">
         <p>{{ $payments->links() }}</p>
     </div>
    

@endsection
