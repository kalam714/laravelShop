@extends('admin.layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 ml-4 text-gray-800">Product</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Product</li>
            </ol>
    </div>

    <div class="row justify-content-center">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

      <div class="col-lg-10">
        <form action="{{route('product.update',[$product->id])}}" method="POST" enctype="multipart/form-data">@csrf
            {{method_field('PATCH')}}
              <div class="card mb-6">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Add Product</h6>
                </div>
                <div class="card-body">
                    <div class="form-group"> 
                      <label for="">Name</label>
                    <input type="text" name="name" value="{{$product->name}}" class="form-control " id="" aria-describedby=""
                        placeholder="Enter name of product">
                    
                    </div>
                    <div class="form-group">
                      <label for="">Description</label>
                      <textarea name="description" id="summernote" class="form-control ">{!!$product->description!!}</textarea>
                      
                    </div>
                    <img src="{{Storage::url($product->photo)}}" width="80" height="80"><br>
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input " id="customFile" name="photo">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                       
                    </div>
                    <div class="form-group"> 
                        <label for="">Price</label>
                    <input type="number" name="price" value="{{$product->price}}" class="form-control " id="" aria-describedby="">
                      
                      </div>
                      <div class="form-group">
                   
                        
                        <label for="">Choose Category</label>
                        <select name="category" class="form-control">
                            <option value="">Choose Category</option>
                            @foreach (App\Models\Category::all() as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                                
                            @endforeach

                        </select>
                      
                       
                    </div>
                    <div class="form-group">
                   
                        
                        <label for="">Choose Sub-Category</label>
                        <select name="subcategory" class="form-control">
                            <option value="">Choose Sub-Category</option>
                            

                        </select>
                      
                       
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>

          </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category"]').on('change', function() {
            var catId = $(this).val();
            if(catId) {
                $.ajax({
                    url: '/subcategories/'+catId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        
                        $('select[name="subcategory"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcategory"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });


                    }//success close
                });
            }else{ //if close and starts
                $('select[name="subcategory"]').empty();
            }
        });
    });
</script>
@endsection