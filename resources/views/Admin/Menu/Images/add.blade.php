@extends('layouts.app')
@section('title')
    Add Images
@endsection
@section('body')
<div style="margin: 60px 30px;">
    <h3><ul>@foreach ($errors->all() as $e)
      <li>{{$e}}</li>
      @endforeach</ul></h3>
      <form action="{{route('menu.images.store',['id'=>$id])}}" method="POST" enctype="multipart/form-data">
        @csrf  
      <div class="mb-3">
          <label for="img_path" class="form-label">Select a image:</label>
          <input type="file" name="img_path" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>    
  </div>
@endsection