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


	<h1 style="color:red; margin-bottom:20px;text-align:center;font-weight:bold;">Ajouter une couleur</h1>
	<form method="post" action="{{ route('admin.managers.colors.store') }}">
 @csrf
<div class="row">

<div class="col-md-12">
<div class="form-group">
 <label for="color_name">Couleur: </label>
 <input type="text" name="color_name" id="color_name" class="form-control" placeholder="Ajouter une couleur" value="{{old('color_name')}}">
</div>
</div>

<div class="col-md-12">
<div class="form-group">
 <label for="description">Description: </label>
 <textarea name="description" class="form-control" rows="7" cols="2" placeholder="Description facultatif"></textarea>
</div>
</div>

</div>

<div class="form-group">
 <button type="submit" class="btn btn-success">Ajouter une couleur</button>

</div>
</form>
</div>
</div>

@endsection






