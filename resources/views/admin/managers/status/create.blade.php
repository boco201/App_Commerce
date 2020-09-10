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


	<h1 style="color:red; margin-bottom:20px;text-align:center;font-weight:bold;">Ajouter une status</h1>
	<form method="post" action="{{ route('admin.managers.status.store') }}">
 @csrf
<div class="row">

<div class="col-md-12">
<div class="form-group">
 <label for="status">Status: </label>
 <input type="text" name="status" id="status" class="form-control" placeholder="Status" value="{{old('status')}}">
</div>
</div>

</div>

<div class="form-group">
 <button type="submit" class="btn btn-success">Ajouter status</button>

</div>
</form>
</div>
</div>

@endsection
