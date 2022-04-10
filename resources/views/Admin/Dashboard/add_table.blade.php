@extends('layouts.app')
@section('body')
<div style="margin: 60px 30px;">
    <h3 style="font-family: cursive;">Add table:</h3>
    <form action="{{route('dashboard.table.store')}}" method="post">
        @csrf
        <div class="form-row">
            <div class="col-md-4">
                <label for="inputTime">Table Number: </label>
                <input type="text" class="form-control" id="inputTime" name="table_number">
            </div>
        </div>       
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputPeople">Capacity: </label>
                <select id="inputPeople" class="form-control" name="capacity">
                    <option selected value="0">Choose...</option>
                    <option value="2">2</option>
                    <option value="4">4</option>
                    <option value="8">8</option>
                    <option value="15">15</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" style="margin: 30px 0px;">Add Table</button>
    </form>
</div>
@endsection