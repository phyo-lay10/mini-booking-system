@extends('admin.layout.master')
@section('content')
<table class="table table-bordered table-hover mt-5">
    <thead>
        <tr>
            <th>ID</th>
            <th>Check In Id</th>
            <th>Check Out Date</th>
            {{-- <th>Action</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($checkOuts  as $index => $checkOut)
        <tr>
            <td>{{++ $index}}</td>
            <td>{{$checkOut->check_in_id}}</td>
            <td>{{$checkOut->check_out_date}}</td>
        </tr> 
        @endforeach
    </tbody>
</table>
@endsection