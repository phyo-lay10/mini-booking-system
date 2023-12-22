@extends('admin.layout.master')
@section('content')
<h4 class="mb-5">Category Create Form</h4>
<div class="card mt-3">
    <form action="{{route('categories.store')}}" method="POST">@csrf
        <div class="card-body">
                <label for="name"><b>Name</b></label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter category name">
                @error('name')
                    <span class="invalid-feedback">{{$message}}</span>
                @enderror
        </div>
        <div class="card-footer border-0">
            <button class="btn btn-sm btn-primary">Create</button>
        </div>
    </form>
</div>
@endsection