@extends('admin.layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 ml-4 text-gray-800">Category</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Category</li>
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
        <form action="{{route('sub-category.update',[$subcategory->id])}}" method="POST" enctype="multipart/form-data">@csrf
            {{method_field('PATCH')}}
              <div class="card mb-6">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Create Category</h6>
                </div>
                <div class="card-body">
                    <div class="form-group"> 
                      <label for="">Name</label>
                    <input type="text" name="name" value="{{$subcategory->name}}"class="form-control " id="" aria-describedby=""
                        placeholder="Enter name of category">
                    
                    </div>
                    <div class="form-group">
                   
                        
                      <label for="">Choose Category</label>
                      <select name="category" class="form-control">
                          <option value="">Choose Category</option>
                          @foreach (App\Models\Category::all() as $category)
                      <option value="{{$category->id}}" 
                        @if($subcategory->category_id ==$category->id)
                        selected
                        @endif
                        >{{$category->name}}</option>
                              
                          @endforeach

                      </select>
                    
                     
                  </div>
                   
                   
                  
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
              </div>
            </form>

          </div>
</div>
@endsection