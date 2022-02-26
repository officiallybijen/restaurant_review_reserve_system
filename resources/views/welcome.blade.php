@extends('layouts.app')
@section('body')
    <h3>
        @if (\Illuminate\Support\Facades\Auth::user())
        {{"welcome to the homepage, ".$user->name}}
     @else
      {{"Welcome to the homepage"}}
    @endif
    </h3>
@endsection