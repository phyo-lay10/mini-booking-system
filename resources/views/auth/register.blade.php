@extends('auth.master')
@section('content')
<div class="row d-flex justify-content-center">
<div class="col-md-4">

    <form action="{{route('registerStore')}}" method="POST"> @csrf
        <h4 class="mt-5"><b>Register Form</b></h4>
        <div class="card card-body mt-4 bg-white shadow border-0 px-4">
            <div class="mb-3">
                <label for="name" class="mb-1"><b>Name</b></label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control shadow @error('name') is-invalid @enderror" id="name" placeholder="Enter your name">
                @error('name')
                    <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="mb-1"><b>Email</b></label>
                <input type="text" name="email" value="{{old('email')}}" class="form-control shadow @error('email') is-invalid @enderror" id="email" placeholder="Enter your email">
                @error('email')
                    <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="mb-1"><b>Phone</b></label>
                <input type="number" name="phone" value="{{old('phone')}}" class="form-control shadow @error('phone') is-invalid @enderror" id="phone" placeholder="Enter your phone">
                @error('phone')
                    <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="mb-1"><b>Address</b></label>
                <input type="text" name="address" value="{{old('address')}}" class="form-control shadow @error('address') is-invalid @enderror" id="address" placeholder="Enter your address">
                @error('address')
                    <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="mb-1"><b>Password</b></label>
                <input type="password" name="password" value="{{old('password')}}" class="form-control shadow @error('password') is-invalid @enderror" id="password" placeholder="Enter your password">
                @error('password')
                    <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div class="my-2">
                <button class="btn btn-sm btn-info mb-3 shadow">Submit</button>
                <div>Already have an account? <a href="{{route('loginForm')}}"> Login here</a></div>
            </div>
        </div>
    </form>
</div>
</div>
@endsection