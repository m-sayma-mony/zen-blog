@extends('backend.master')

@section('title','Manage Blog')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-12 col-12">
            <div class="bg-light rounded h-100 p-4">
                <h1 class="mb-4 text-center">Manage Blog</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Category</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$blog->id}}</td>
                            <td>{{$blog->title}}</td>
                            <td>{{$blog->slug}}</td>
                            <td>{{$blog->category->name}}</td>
                            <td>{{$blog->description}}</td>
                            <td>
                                <img src="{{asset($blog->image)}}" alt="" width="50">
                            </td>
                            <td>{{$blog->status == 1 ? 'Active' : 'Inactive'}}</td>
                            <td>
                                <a href="{{route('blogs.edit', $blog->id)}}" class="btn btn-sm">
                                    <i class="fa fa-edit me-2 text-primary"></i>
                                </a>
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