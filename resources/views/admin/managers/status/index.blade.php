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
        <h3 class="box-title" style="text-align:center">Status Information</h3>
        <p style="text-align:right; margin-right:30px;"><a href="{{ route('admin.managers.status.create') }}" class="btn btn-primary">Nouvelle Status</a></p>
 
       </div>

       <div class="box-body">
       <table class="table table-condensed">
      <tr style="background-color:tomato;color:#fff;height:50px;">
          <td>#</td>
          <td>Status</td>
          <td>Created</td>
          <td>Last Update</td>
          <td>Action</td>
        
      </tr>

      @foreach($colors as $key =>$color)
      <tr>
          <td>{{ ++$key }} </td>
          <td>{{ $color->status }}</td>
          <td>{{ $color->created_at }}</td>
          <td>{{ $color->updated_at }}</td>
          <td><a href="" class="btn btn-secondary">Editer</a> <a href="{{ route('admin.managers.status.destroy', $color->id ) }}" class="btn btn-danger">Supprimer</a></td>
      </tr>

      @endforeach
  
    
   </table>
     </div>


@endsection