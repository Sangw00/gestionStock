@extends("layouts.home")
@section("content")
    <div class="m-2 d-flex align-items-center">
        <h1 class="">All Products</h1>
        <a href="{{ route("product.create") }}" class="btn btn-outline-secondary">                <span class="material-symbols-outlined">add</span></a>
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
                <td><a href="{{ route("product.edit",["id" => $product->id]) }}" class="btn btn-outline-secondary">
                    <span class="material-symbols-outlined">edit</span>
                </a></td>
                <td><a href="{{ route("product.delete",["id" => $product->id])}}" class="btn btn-outline-secondary">
                <span class="material-symbols-outlined">delete</span>
                </a></td>
                <td><a href="{{ route("product.show",["id" => $product->id]) }}" class="btn btn-outline-secondary">
                <span class="material-symbols-outlined">more</span>
                </a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
