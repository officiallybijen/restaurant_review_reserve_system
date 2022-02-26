@extends('layouts.app')
@section('title')
    Login
@endsection
@section('body')
<h3><ul>@foreach ($errors->all() as $e)
  <li>{{$e}}</li>
@endforeach</ul></h3>
<form action="{{route('login.store')}}" method="POST">
  @csrf  
  <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>    
@endsection