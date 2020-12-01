@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{route('all.product')}}" method="GET">
        <div class="form-row">
            <div class="col-md-4">
                <input type="text" name="search" placeholder="Search Product..." class="form-control">

            </div>
            <div class="col">
                <button type="submit" class="btn btn-dark">Search</button>
            </div>
        </div>
    </form>
    <br>
    
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
    <br>
    <center>
    {{$products->links()}}
    </center>

</div>
@endsection