@extends('layouts.app')

@section('content')


<div class="container">


	
<div class="card">
	<div class="row">
		<aside class="col-sm-5 border-right">
			<section class="gallery-wrap"> 
			<div class="img-big-wrap">
			  <div> <a href="#">
			  	<img src="{{Storage::url($product->photo)}}" width="100%" height="100%"></a>
			  </div>
			</div> 
			
			</section> 
		</aside>



		<aside class="col-sm-7">
			<section class="card-body p-5">
				<h3 class="title mb-3">{{$product->name}}</h3>

<p class="price-detail-wrap"> 
	<span class="price h3 text-danger"> 
   Price  <span class="currency">BDT. {{$product->price}}</span>
	 
</p> 
  <h3>Description</h3>
  <p>{!!$product->description!!} </p>
  

<hr>
	
	
<a href="{{route('addToCart',[$product->id])}}"> <button type="button" class="btn btn-sm btn-outline-secondary">Add To Cart</button></a>
</section> 
		</aside> 

	</div> 
</div> 
@if(count($sameCatPro)>0)
<div class="jumbotron">
	<div class="row">
		@foreach($sameCatPro as $product)
		<div class="col-4">
			<div class="card mb-4 shadow-sm">
				<img src="{{Storage::url($product->photo)}}" width="100%" height="250">
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
@endif

</div>

@endsection