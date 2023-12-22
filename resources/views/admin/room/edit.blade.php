@extends('admin.layout.master')
@section('content')
<div  class="mb-5 d-flex justify-content-between">
    <h4>Category Edit Form</h4>
    <div><a href="{{route('rooms.index')}}" class="btn btn-sm btn-info">Back</a></div>
</div>
<div class="card mt-3">
    <form action="{{route('rooms.update',$room->id)}}" method="POST" enctype="multipart/form-data">@csrf @method('put')
        <div class="card-body">
            <div class="mb-3">
                <label for="no"><b>Room No</b></label>
                <input type="number" name="no" id="no" value="{{old('no') ?? $room->no}}" class="form-control @error('no') is-invalid @enderror" placeholder="Enter room no">
                @error('no')
                    <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category_id"><b>Category</b></label>
                <select name="category_id" id="" class="form-control  @error('category_id') is-invalid @enderror">
                    <option value="">Choose category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{$room->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="price"><b>Price</b></label>
                <input type="text" name="price" value="{{old('price') ?? $room->price}}" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Enter room price">
                @error('price')
                    <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div> 
            <div class="mb-3">
                <label><b>Image1</b></label>
                <input type="file" name="image1" class="form-control @error('image1') is-invalid @enderror">
                <img src="{{asset('storage/images/'.$room->image1)}}" class="rounded-circle mt-3" style="width:80px; height: 80px; object-fit:cover">
                @error('image1')
                    <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>    
            <div class="mb-3">
                <label><b>Image2</b></label>
                <input type="file" name="image2" class="form-control @error('image2') is-invalid @enderror">
                <img src="{{asset('storage/images/'.$room->image2)}}" class="rounded-circle mt-3" style="width:80px; height: 80px; object-fit:cover">
                @error('image2')
                    <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>  
            <div class="mb-3">
                <label><b>Image3</b></label>
                <input type="file" name="image3" class="form-control @error('image3') is-invalid @enderror">
                <img src="{{asset('storage/images/'.$room->image3)}}" class="rounded-circle mt-3" style="width:80px; height: 80px; object-fit:cover">
                @error('image3')
                    <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div> 
            <div class="mb-3">
                <label><b>Image4</b></label>
                <input type="file" name="image4" class="form-control @error('image4') is-invalid @enderror">
                <img src="{{asset('storage/images/'.$room->image4)}}" class="rounded-circle mt-3" style="width:80px; height: 80px; object-fit:cover">
                @error('image4')
                    <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>     
        </div>
        <div class="card-footer border-0">
            <button type="submit" class="btn btn-sm btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection