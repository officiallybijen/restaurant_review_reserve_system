@extends('layouts.app')
@section('title')
    Menu
@endsection
@section('body')
    <div>
        <br>
        <br>
        <br>
        <br>
        <div class="container">
            @can('menu_add')
                <a href="{{ route('menu.add') }}" style="text-decoration: none;"><i class="fa-solid fa-circle-plus"></i> Add Food</a>
            @endcan
            <div class="row row-cols-1 row-cols-md-3">
                @foreach ($menu as $m)
                    <div class="col mb-4">
                        <div class="card" style="margin:10px;width: 18rem;">
                            <img src="{{ asset('images/' . $m->img_path) }}" class="card-img-top"
                                alt="{{ $m->foodName . ' picture' }}" width="200" height="250" style="border-radius: 10%;box-shadow: 5px 5px grey;object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $m->foodName }}</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" >Rs. {{ $m->price }}</li>
                                    @if ($m->is_veg)
                                    <li class="list-group-item" style="color: white;text-align: center;background-color: green; border-radius: 5px;">Veg</li>
                                    @else
                                    <li class="list-group-item" style="color: white;text-align: center;background-color: red; border-radius: 5px;">Non-Veg</li>
                                    @endif
                    
                            </ul>
                            @can('menu_delete')
                                <div class="card-body">
                                    {{-- @if (\Illuminate\Support\Facades\Auth::user())
                    <a href="{{route('review',['id'=>$m->id])}}" class="card-link ">Review</a>
                @endif --}}
                                    <a href="{{ route('menu.delete', ['id' => $m->id]) }}" class="card-link text-danger"
                                        style="text-decoration: none;"><i class="fa-regular fa-trash-can"></i> Delete</a>
                                    <a href="{{ route('menu.edit', ['id' => $m->id]) }}" class="card-link text-warning"
                                        style="text-decoration: none;"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    <a href="{{ route('menu.images', ['id' => $m->id]) }}" class="card-link text-info"
                                        style="text-decoration: none;"><i class="fa-solid fa-plus"></i> Images</a>
                                </div>
                            @endcan
                            {{-- @if (\Illuminate\Support\Facades\Auth::user()) --}}
                            <div class="card-body">
                                <a href="{{ route('review', ['id' => $m->id]) }}" class="card-link"
                                    style="text-decoration: none;"><i class="fa-regular fa-comments"></i> Review</a>
                            </div>
                            {{-- @endif --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
