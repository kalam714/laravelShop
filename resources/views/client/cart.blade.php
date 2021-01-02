@extends('layouts.app')

@section('content')

<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<table id="cart" class="table table-hover ">
    	

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Product</th>
      <th scope="col">Price</th>
      <th scope="col">Qty</th>
      <th>Remove</th>
    </tr>
  </thead>
  <tbody>
      @if($cart)
      @php $i=1 @endphp
      @foreach($cart->items as $product)
    <tr>
    <th scope="row">{{$i++}}</th>
    <td><img src="{{Storage::url($product['photo'])}}" width="100"></td>
    
      <td>{{$product['name']}}</td>
      <td>BDT. {{$product['price']}}</td>
      <td>
      <form action="{{route('qty.update',$product['id'])}}" method="POST" >@csrf
      <input type="text" name="qty" value="{{$product['qty']}}">
      	<button class="btn btn-secondary btn-sm"><i class="fas fa-sync"></i>update</button>
      
    </form>
</td>
<td>
    <form action="{{route('remove.product',$product['id'])}}" method="POST">@csrf
      <button class="btn btn-danger">Remove</button>
    </form>
</td>
    </tr>
  @endforeach

  </tbody>
</table>	
<hr>
<div class="card-footer">
	<button class="btn btn-warning">Continue Shopping</button>
<span style="margin-left:300px;">Total Price:BDT {{$cart->totalPrice}}</span>
@if(Auth::check())
<a href="{{route('checkout',$cart->totalPrice)}}"><button class="btn btn-info float-right">Checkout</button></a>
@endif
</div>	
@else
<h1>No Items In The Cart</h1>
@endif		
</div>
@endsection