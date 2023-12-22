{{-- @extends('admin.layout.master')
@section('content')
<button type="button" class="btn btn-sm btn-primary mb-3 position-relative">
    Noti
     <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
     {{count($checkIns)}}
     <span class="visually-hidden">unread messages</span>
     </span>
 </button>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Booking ID</th>
            <th>Room ID</th>
            <th>Check In Date</th>
            <th>Check In By Id</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $checkIns as $index =>  $checkIn)
        <tr>
            <td>{{$index + 1}}</td>
            <td>{{$checkIn->book_id}}</td>
            <td>{{$checkIn->room_id}}</td>
            <td>{{$checkIn->check_in_date}}</td>
            <td>{{$checkIn->check_in_by_id}}</td>
            <td>
                <form action="{{route('checkOut',$checkIn->book_id)}}" method="POST"> @csrf
                    <button class="btn btn-sm btn-primary">CheckOut</button>
                </form>
            </td>
        </tr> 
        @endforeach
    </tbody>
</table>
@endsection --}}

@extends('admin.layout.master')
@section('content')
<button type="button" class="btn btn-sm btn-primary mb-3 position-relative">
    Noti
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        {{ count($checkIns) }}
        <span class="visually-hidden">unread messages</span>
    </span>
</button>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Booking ID</th>
            <th>Room ID</th>
            <th>Check In Date</th>
            <th>Check In By Id</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($checkIns as $index => $checkIn)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $checkIn->book_id }}</td>
            <td>{{ $checkIn->room_id }}</td>
            <td>{{ $checkIn->check_in_date }}</td>
            <td>{{ $checkIn->check_in_by_id }}</td>
            <td>
                @if (!$checkIn->isCheckedOut())
                <form action="{{ route('checkOut', $checkIn->book_id) }}" method="POST">
                    @csrf
                    <button class="btn btn-sm btn-primary">CheckOut</button>
                </form>
                @else
                <span class="text-danger">Already Checked Out</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
