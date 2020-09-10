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


	<h1 style="color:red; margin-bottom:20px;text-align:center;font-weight:bold;">Ajouter une catégories</h1>
	<form method="post" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
 @csrf
<div class="row">

<div class="col-md-12">
<div class="form-group">
 <label for="category_name">Nom catégorie: </label>
 <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Ajouter un nom de catégorie" value="{{old('category_name')}}">
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
 <button type="submit" class="btn btn-success">Ajouter une catégorie</button>

</div>
</form>
</div>
</div>

@endsection






