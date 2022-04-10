@extends('layouts.app')
@section('body')
    <div style="margin: 60px 30px;">
    <div class="row">
            <div class="col-md-2">
                <ul class="list-inline">
                    <li class="list-inline-item">View Reservation</li>
                    <li class="list-inline-item">Manage Table</li>
                    <li class="list-inline-item">Reported Comment</li>
                </ul>
                <a href="{{route('reservation.view')}}">view Reservation</a>
                <a href="{{route('dashboard.table')}}">Add a table</a>
            </div>
        </div>
    </div>
@endsection
