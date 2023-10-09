@extends('backend.master')

@section('title','Add Category')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12 col-sm-12">
            <div class="bg-light rounded h-100 p-4">
                    @include('notify')
                    <h1 class="mb-4 text-center">Update Category</h1>
                    <form action="{{route('admin.category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{$category->name}}" placeholder="Give a Name">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description </label>
                            <textarea name="desc" class="form-control" placeholder="Give a Description" cols="30" rows="3">{{$category->desc}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Icon </label>
                            <input type="file" name="icon" class="form-control">
                            <img src="{{asset($category->icon)}}" alt="" width="80" height="60">
                            @error('icon')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection