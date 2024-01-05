@extends("layouts.home")
@section("content")
@foreach($categories as $category)
<h1>{{$category->name}}</h1>
<p>{{$category->description}}</p>

@endforeach
@endsection()