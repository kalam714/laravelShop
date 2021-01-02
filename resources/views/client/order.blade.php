@extends('layouts.app')

@section('content')

 <div class="container">
 	
 	<div class="row justify-content-center">
 		<div class="col-md-8">
 			@foreach($carts as $cart)
 			<div class="card mb-3">
 				<div class="card-body">
 					@foreach($cart->items as $product)
 					<span class="float-right">
 						<img src="{{Storage::url($product['photo'])}}"  width="100">
 					</span>

 					<p>Name:{{$product['name']}}</p>
 					<p>Price:{{$product['price']}}</p>
 					<p>Qty:{{$product['qty']}}</p>

 					@endforeach
 					
 				</div>

 			</div>
 			<p>
 				<button type="button" class="btm btn-info" style="color: #fff;">
 					<span class="">
 						Total price:${{$cart->totalPrice}}
                     </span>
                     
 				</button>
 			</p>
 			<hr>
 			@endforeach
 		</div>
 	</div>
 	


 </div>

 @endsection