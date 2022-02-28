@extends('layouts.app')
@section('title')
    
@endsection
@section('body')
   <h3>welcome to the review, all the reviews are</h3>
   <div class="card" style="margin:10px;width: 18rem;">
    <img src="{{asset('images/'.$menu->img_path)}}" class="card-img-top" alt="{{$menu->foodName.' picture'}}">
    <div class="card-body">
      <h5 class="card-title">{{$menu->foodName}}</h5>
     </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Price: Rs {{$menu->price}}</li>
      <li class="list-group-item">
          @if ($menu->is_veg)
          Veg  
          @else
          NonVeg
          @endif
      </li>                         
    </ul> 
</div>
   @foreach ($review as $item)
       <h5>Review by: {{$user->name}}</h5>
       <h5>{{$item->comment}}</h5>
       <h5>Rate: {{$item->rate}}</h5><br><br>

   @endforeach 
@endsection