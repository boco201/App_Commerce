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
        <p style="text-align:right; margin-right:30px;"><a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Nouvelle catégories</a></p>
 
       </div>

       <div class="box-body">
       <table class="table table-condensed">
      <tr style="background-color:tomato;color:#fff;height:50px;">
          <td>#</td>
          <td>Name</td>
          <td>Description</td>
          <td>Active</td>
          <td>Created</td>
          <td>Last Update</td>
          <td>Image</td>
          <td>Editer</td>
          <td>Supprimer</td>
      </tr>
      @foreach($categories as $key =>$category)
      <tr>
          <td>{{ ++$key }} </td>
          <td>{{ $category->category_name }}</td>
          <td>{{ $category->description }}</td>
          <td>{{ $category->is_active }}</td>
          <td>{{ $category->created_at }}</td>
          <td>{{ $category->updated_at }}</td>
          <td>
              <img src="{{ asset('image/categories/'.$category->image) }}" alt="" width="80" height="50">
          </td>
          <td><a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-secondary">Editer</a> </td>
          <td> 
          <form action="{{ route('admin.categories.destroy', $category->id) }}"  method="POST" enctype="multipart/form-data">
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
         <p>{{ $categories->links() }}</p>
     </div>


@endsection