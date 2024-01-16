@extends("layouts.home")
@section("content")
    <div class="m-2 d-flex align-items-center">
        <h1 class="">All Categories</h1>
        <a href="{{ route("category.create") }}" class="btn btn-outline-secondary">New category</a>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td><a href="{{ route("category.edit", ["id" => $category->id]) }}" class="btn btn-outline-secondary">Edit</a></td>
                <td><a href="{{ route("category.delete", ["id" => $category->id]) }}" class="btn btn-outline-secondary">Delete</a></td>
                <td><a href="{{ route("category.show", ["id" => $category->id]) }}" class="btn btn-outline-secondary">Details</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
