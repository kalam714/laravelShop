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
        <form action="{{route('category.update',[$category->id])}}" method="POST" enctype="multipart/form-data">@csrf
            {{method_field('PATCH')}}
              <div class="card mb-6">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Create Category</h6>
                </div>
                <div class="card-body">
                    <div class="form-group"> 
                      <label for="">Name</label>
                    <input type="text" name="name" value="{{$category->name}}"class="form-control " id="" aria-describedby=""
                        placeholder="Enter name of category">
                    
                    </div>
                    <div class="form-group">
                      <label for="">Description</label>
                    <textarea name="description" class="form-control ">{{$category->description}}</textarea>
                      
                    </div>
                    <img src="{{Storage::url($category->photo)}}" width="80" height="80"><br>
                    <div class="form-group">
                      <div class="custom-file">
                        
                        <input type="file" class="custom-file-input " id="customFile" name="photo">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        
                      </div>
                       
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