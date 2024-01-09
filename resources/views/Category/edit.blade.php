@extends("layouts.home")
@section("content")
<form  method="POST">
  @csrf <!-- Add CSRF token for security -->
  <div class="container">
    <div class="card">
      <div class="card-header bg-secondary text-light">Edit Category</div>
      <div class="card-body">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Ex: tech/sports/education ...etc">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control" id="description" name="description" placeholder="Add a description to your category">
        </div>
        <button type="submit" class="btn btn-outline-secondary">Edit</button>
      </div>
    </div>
  </div>
</form>

@endsection