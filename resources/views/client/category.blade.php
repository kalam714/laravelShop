@extends('layouts.app')

@section('content')


    <div class="container">
        <h2>Products</h2>

      <div class="row">
        <div class="col-md-2">
        <form action="{{route('category.products',[$slug])}}" method="GET">
           @foreach($subcategories as $subcategory)
              <p><input type="checkbox" name="subcategory[]" value="{{$subcategory->id}}"
                >
                {{$subcategory->name}}</p>
           @endforeach
          <input type="submit" value="Filter" class="btn btn-success">
         </form>
         <hr>
         <h2>Price</h2>
         <form action="{{route('category.products',[$slug])}}" method="GET">
           <input type="number" name="min" class="form-control" placeholder="minmum price" required="" ><br>
           <input type="number" name="max" class="form-control" placeholder="maximum price" required="" ><br>
         <input type="hidden" name="categoryId" value="{{$categoryId}}">
           <input type="submit" value="Filter" class="btn btn-dark">
          </form>
          <hr>
          <a href="{{route('category.products',[$slug])}}"><button btn btn-success>Back</button></a>


        </div>
      <div class="col-md-10">
        <div class="row">
   @foreach($products as $product)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img src="{{Storage::url($product->photo)}}" height="200" style="width: 100%">
            <div class="card-body">
            <p><strong>{{$product->name}}</strong></p>
              <p class="card-text">
                {!! $product->description!!}
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                 <a href="{{route('singleproduct',[$product->id])}}"> <button type="button" class="btn btn-sm btn-outline-success">View</button>
                 </a>
                 <a href="{{route('addToCart',[$product->id])}}"> <button type="button" class="btn btn-sm btn-outline-secondary">Add To Cart</button></a>
                </div>
            <small class="text-muted"><strong>BDT. {{$product->price}}</strong></small>
              </div>
            </div>
          </div>
        </div>
    @endforeach
      </div>
    </div>
</div>
</div>

      
  

@endsection
