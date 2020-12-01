@extends('layouts.app')

@section('content')
<div class="container">
<main role="main">
  <div class="container">
    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">

<div class="carousel-inner">
  @if(count($sliders)>0)
  @foreach($sliders as $key=> $slider)

  <div class="carousel-item {{$key == 0 ? 'active' : ''}} ">
    <img src="{{Storage::url($slider->photo)}}" >
  </div>
  <br>
  @endforeach
  @endif
</div>
<a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
</div>
</div>

      <h1>Categories</h1>
      @foreach (App\Models\Category::all() as $category)

   <a href="{{ route('category.products',[$category->slug])}}"> <button width="100" class="btn btn-primary">{{$category->name}}</button></a>
          
      @endforeach

  <div class="album py-5 bg-light">
    <div class="container">
        <strong>Products</strong>

      <div class="row">
          @foreach($products as $product)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
          <img src="{{Storage::url($product->photo)}}" width="335" height="300">
            <div class="card-body">
            <strong>{{$product->name}}</strong>
            <p class="card-text">{!!Str::limit($product->description,50)!!}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{ route('singleproduct',[$product->id])}}"> <button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                <a href="{{route('addToCart',[$product->id])}}"> <button type="button" class="btn btn-sm btn-outline-secondary">Add To Cart</button></a>
                </div>
                <strong class="text-muted">BDT. {{$product->price}}</strong>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    
     
      </div>
    </div>
    <center>
    <a href="{{route('all.product')}}"><button class="btn btn-primary">More Products</button> </a>
    </center>
  </div>

{{--Carousel--}}
  <div class="jumbotron">
 
    <div id="carouselExampleFade" class="carousel slide " data-ride="carousel">
<div class="carousel-inner">

 <div class="carousel-item active">
  <div class="row">
    @foreach($randomActPro as $product)
    <div class="col-4">
        <div class="card mb-4 shadow-sm">
            <img src="{{Storage::url($product->photo)}}" width="335" height="300">
              <div class="card-body">
              <strong>{{$product->name}}</strong>
              <p class="card-text">{!!Str::limit($product->description,50)!!}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                   <a href="{{ route('singleproduct',[$product->id])}}"> <button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                   <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{route('addToCart',[$product->id])}}"> Add To Cart</a></button>
                  </div>
                  <strong class="text-muted">BDT. {{$product->price}}</strong>
                </div>
              </div>
            </div>
    </div>
    @endforeach
  </div>
 </div>

 <div class="carousel-item">
  <div class="row">
    @foreach($randomItemPro as $product)
    <div class="col-4">
        <div class="card mb-4 shadow-sm">
            <img src="{{Storage::url($product->photo)}}" width="335" height="300">
              <div class="card-body">
              <strong>{{$product->name}}</strong>
              <p class="card-text">{!!Str::limit($product->description,50)!!}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="{{ route('singleproduct',[$product->id])}}"> <button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                    <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{route('addToCart',[$product->id])}}"> Add To Cart</a></button>
                  </div>
                  <strong class="text-muted">BDT. {{$product->price}}</strong>
                </div>
              </div>
            </div>
    </div>
    @endforeach
   

  </div>
 </div>



</div>
<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
 <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
 <span class="carousel-control-next-icon" aria-hidden="true"></span>
 <span class="sr-only">Next</span>
</a>
</div>
    
  </div>

</main>
<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
    <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p>New to Bootstrap? <a href="https://getbootstrap.com/">Visit the homepage</a> or read our <a href="/docs/4.4/getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer>
</div>
@endsection
