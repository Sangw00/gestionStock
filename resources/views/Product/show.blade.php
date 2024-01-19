@extends("layouts.home")
@section("content")
<div class="card-group">
  <div class="card">
    <img src="{{ asset('/storage/images/'.$product->image) }}" width="10px" class="card-img-top" alt="image">
    <div class="card-body">
      <h5 class="card-title">{{$product->name}}</h5>
      <p class="card-text">{{$product->description}}</p>
      <p class="card-text"><small class="text-muted">{{$product->price}}</small>DH</p>
    </div>
  </div>
</div>
@endsection
