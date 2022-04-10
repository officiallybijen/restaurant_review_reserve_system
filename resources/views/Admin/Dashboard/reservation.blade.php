@extends('layouts.app')
@section('body')
    <div style="margin: 60px 30px;">
        <h1 style="font-family: cursive;">Reservation made:</h1>
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Guest Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Number of guest</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_reserve as $reserve)
                    <tr>
                        <th scope="row">{{ $reserve->id }}</th>
                        <td>{{$reserve->user->name}}</td>
                        <td>{{ $reserve->date }}</td>
                        <td>{{ $reserve->time }}</td>
                        <td>{{ $reserve->numPeople }}</td>
                        <td><a href="{{route('reservation.delete',['id'=>$reserve->id])}}">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
