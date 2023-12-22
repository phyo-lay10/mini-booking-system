@extends('admin.layout.master')
@section('content')
    <a href="{{route('rooms.create')}}" class="btn btn-sm btn-primary my-3">Add</a>

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
                <th>Room No</th>
                <th>Status</th>
                <th>Category</th>
                <th>Price</th>
                <th>Images</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $index => $room)
            <tr>
                <td>{{++ $index}}</td>
                <td>{{$room->no}}</td>
                <td class=" @if($room->status=='available') text-success @else text-danger  @endif fw-bold">{{$room->status}}</td>
                <td>{{$room->category->name}}</td>
                <td>$ {{$room->price}}</td>
                <td>
                    <img src="{{asset('storage/images/'.$room->image1)}}" class="rounded-circle" style="width:80px; height: 80px; object-fit:cover">
                    <img src="{{asset('storage/images/'.$room->image2)}}" class="rounded-circle" style="width:80px; height: 80px; object-fit:cover">
                    <img src="{{asset('storage/images/'.$room->image3)}}" class="rounded-circle" style="width:80px; height: 80px; object-fit:cover">
                    <img src="{{asset('storage/images/'.$room->image4)}}" class="rounded-circle" style="width:80px; height: 80px; object-fit:cover">
                </td>
                <td>
                    <form action="{{route('rooms.destroy',$room->id)}}" method="POST"> @csrf @method('delete')
                        <a href="{{route('rooms.edit',$room->id)}}" class="btn btn-sm btn-info">Edit</a>
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are u sure?')">Delete</button>
                        {{-- <a href="{{route('booking',$room->id)}}" class="btn btn-sm btn-primary">Booking</a> --}}
                    </form>
                </td>
            </tr> 
            @endforeach
        </tbody>
    </table>
@endsection