@extends('layouts.app')
@section('body')
    <div style="margin: 60px 30px;">
        <h1 style="font-family: cursive;">Tables: </h1>
        <a href="{{route('dashboard.table.add')}}">Add a New Table</a>
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Table Number</th>
                    <th scope="col">Capacity</th>
                    <th scope="col">Table Added At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($table as $t)
                    <tr>
                        <th scope="row">{{ $t->id }}</th>
                        <td>{{$t->table_number}}</td>
                        <td>{{ $t->capacity }}</td>
                        <td>{{ $t->created_at }}</td>
                        <td><a href="{{route('dashboard.table.delete',['id'=>$t->id])}}" onclick="return doConfirm()">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection
