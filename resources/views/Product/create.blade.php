@extends("layouts.home")

@section("content")
  <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf <!-- Add CSRF token for security -->

    <div class="container">
      <div class="card">
        <div class="card-header bg-secondary text-light">New Product</div>
        <div class="card-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>

          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
          </div>

          <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="image" accept="image/*" required>
          </div>

          <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" required>
          </div>

          <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-select" name="category_id" aria-label=".form-select" required>
              @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>

          <button type="submit" class="btn btn-outline-secondary pt-2">Add</button>
        </div>
      </div>
    </div>
  </form>
@endsection
