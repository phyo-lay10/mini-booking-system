@extends('admin.layout.master')
@section('content')
    <a href="{{route('categories.create')}}" class="btn btn-sm btn-primary my-3">Add</a>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session()->get('success')}}            
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                    <form action="{{route('categories.destroy', $category->id)}}" method="POST"> @csrf @method('delete')
                        <a href="{{route('categories.edit', $category->id)}}" class="btn btn-sm btn-info">Edit</a>
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are u sure?')">Delete</button>
                    </form>
                </td>
            </tr> 
            @endforeach
        </tbody>
    </table>
@endsection