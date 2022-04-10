@extends('layouts.app')
@section('body')
    <div style="margin: 60px 30px;">
        <h3 style="font-family: cursive;">Please fill in the form below:</h3>
        <h4 style="font-family: cursive;color: red;">
        @if (isset($err))
        {{$err}}             
        @endif</h4>
        <h4 style="font-family: cursive;color: rgb(77, 124, 211);">
            @if (isset($msg))
            {{$msg}}             
            @endif</h4>

            @if (isset($needConfirm))
            @if ($needConfirm==TRUE)
                <a href="{{route('reserve.store.confirmed')}}" onclick="return doConfirm()">Confirmation</a>                
            @endif             
            @endif</h4>

        <form action="{{route('reserve.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="inputTime">Expected time of arrival:</label>
                    <input type="time" class="form-control" id="inputTime" name="time" min="14:00" max="21:00" step="1800">
                    <span class="text-info">Time must be between: 1:00pm to 9:00pm<br>
                    Eg: 1:30, 4:00, 6:30....</span>
                </div>
                <div class="col-md-6">
                    <label for="inputDate">Reservation Date</label>
                    <input type="date" class="form-control" id="inputDate" name="date">
                </div>
            </div>       
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputPeople">Number of guests:</label>
                    <select id="inputPeople" class="form-control" name="numPeople">
                        <option selected value="0">Choose...</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputMsg">Special Message: <span style="color: grey;">(option)</span></label>
                    <textarea name="msg" class="form-control" cols="50" rows="10" id="inputMsg"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="margin: 30px 0px;">Book Now</button>
        </form>
    </div>
@endsection
