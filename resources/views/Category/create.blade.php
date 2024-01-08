@extends("layouts.home")
@section("content")
<form>
<div class="container  ">
<div class="card ">


<div class="card-header bg-secondary text-light" > New Category</div>
<div class="card-body" >
<div class="form-group">
    <label for="name">name</label>
    <input type="text" class="form-control" id="name" placeholder="Ex: tech/sports/education ...etc">
  </div>
  <div class="form-group">
    <label for="description">description</label>
    <input type="text" class="form-control" id="description" placeholder="add a description to your category">
  </div>
<a href="{{route('category.create')}}" class=" btn btn-outline-secondary ">add</a>

</form>
</div>
</div>
</div>
  

@endsection