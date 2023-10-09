@extends('backend.master')

@section('title','admin/category/manage')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12 col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Basic Table</h6>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Email</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $category)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$category->name}}</td>
                            <td>{{$category->desc}}</td>
                            <td>
                                <img src="{{asset($category->icon)}}" alt="" width="50" height="20">
                            </td>
                            <td>{{$category->status==1 ? 'Active' : 'Inactive'}}</td>
                            <td>
                                <div class="d-grid">
                                    <a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-primary">Edit</a>
                                </div>
                                <form action="{{route('admin.category.delete',$category->id)}}" method="POST">
                                    @csrf
                                    <div class="d-grid">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are sure to delete this ?')">Delete</button>
                                    </div>
                                </form>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection