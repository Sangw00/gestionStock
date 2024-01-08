@extends("layouts.home")
@section('content')
<div clas="m-2 d-flex align-items-center ">
<h1 class="">All Categories</h1>
<a href="{{route('category.create')}}" class=" btn btn-outline-secondary ">new category</a>

</div>
<table class="table table-hover ">
  <thead>
    <tr>
      <th >id</th>
      <th >Name</th>
      <th >Description</th>
      <th >Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($categories as $category)
    <tr>
      <td >{{$category->id}}</td>
      <td>{{$category->name}}</td>
      <td>{{$category->description}}</td>
      <td>  <a type="submit" class="btn btn-outline-secondary">Edit</a></td>
      <td>  <a type="submit" class="btn btn-outline-secondary">Delete</a></td>
      
    </tr>@endforeach
    
  </tbody>
</table>
@endsection()