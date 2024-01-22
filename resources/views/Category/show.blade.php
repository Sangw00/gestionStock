@extends("layouts.home")
@section("content")
<style>
    img{width:480px;
    height:400px}
</style>
<h1>{{$category->name}}</h1>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    @foreach($products as $index => $product)
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$index}}" @if($index == 0) class="active" @endif aria-label="Slide {{$index + 1}}"></button>
    @endforeach
  </div>

  <div class="carousel-inner">
    @foreach($products as $index => $product)
      <div class="carousel-item @if($index == 0) active @endif">
        <img src="{{ asset('/storage/images/'.$product->image) }}" class="d-block w-100" alt="image">
        <div class="carousel-caption d-none d-md-block">
          <h2>{{$product->name}}</h2>
          <p>{{$product->description}}</p>
        </div>
      </div>
    @endforeach
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

@endsection
