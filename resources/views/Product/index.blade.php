@extends("layouts.home")
@section("content")
    <div class="m-2 d-flex align-items-center">
        <h1 class="">All Products</h1>
        <a href="{{ route("product.create") }}" class="btn btn-outline-secondary">New product</a>
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
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td><a href="{{ route("product.edit",["id" => $product->id]) }}" class="btn btn-outline-secondary">Edit</a></td>
                <td><a href="" class="btn btn-outline-secondary">Delete</a></td>
                <td><a href="" class="btn btn-outline-secondary">Details</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
