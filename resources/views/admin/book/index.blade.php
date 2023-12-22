@extends('admin.layout.master')
@section('content')
    <div class="d-flex justify-content-end"><a href="{{route('rooms.index')}}" class="btn btn-sm btn-info my-3">Back</a></div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session()->get('success')}}            
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($books->isEmpty())
        <p class="text-center mt-5 fs-5"><b>No bookings has found for this room !</b></p>   
    @else

        <button type="button" class="btn btn-sm btn-primary mb-3 position-relative">
           Noti
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            {{count($books)}}
            <span class="visually-hidden">unread messages</span>
            </span>
        </button>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Guest Id</th>
                    <th>Guest Name</th>
                    <th>Room Id</th>
                    <th>Room No</th>
                    <th>Check In Date</th>
                    <th>Check Out Date</th>
                    <th>Duration</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $books as $index =>  $book)
                <tr>
                    <td>{{$index + 1}}</td>
                    <td>{{$book->guest_id}}</td>
                    <td>{{$book->guest->name}}</td>
                    <td>{{$book->room_id}}</td>
                    <td>No ({{$book->room->no}})</td>
                    <td>{{$book->check_in_date}}</td>
                    <td>{{$book->check_out_date}}</td>
                    <td>{{$book->duration}} - @if ($book->duration > 1)
                        days @else day
                    @endif</td>
                    <td>$ {{$book->total_amount}}</td>
                    <td>
                        {{-- <form action="{{ $book->room->status == 'available' ? route('checkIn', $book->id) :  route('checkOut', $book->id)}}" method="POST"> @csrf
                            <button class="btn btn-sm 
                            {{$book->room->status == 'available' ? 'btn-primary' : 'btn-danger'}}
                            ">
                                {{$book->room->status == 'available' ? 'Check In' : 'Check Out'}}
                            </button>
                        </form>   --}}
                        <form action="{{route('checkIn',$book->id)}}" method="POST"> @csrf
                            <button class="btn btn-sm btn-primary">Check In</button>
                        </form>
                    </td>
                </tr> 
                @endforeach
            </tbody>
        </table>
    @endif
@endsection