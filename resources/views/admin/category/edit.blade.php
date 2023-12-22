@extends('admin.layout.master')
@section('content')
<h4 class="mb-5">Category Edit Form</h4>
    <div class="card mt-3">
        <form action="{{route('categories.update',$category->id)}}" method="POST">@csrf @method('put')
            <div class="card-body">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$category->name}}">
                    @error('name')
                     <span class="invalid-feedback">{{$message}}</span>
                    @enderror
            </div>
            <div class="card-footer border-0">
                <button class="btn btn-sm btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection