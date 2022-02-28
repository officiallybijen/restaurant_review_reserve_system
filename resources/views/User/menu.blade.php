@extends('layouts.app')
@section('title')
    Menu
@endsection
@section('body')
    @can('menu_add')
        <a href="{{ route('menu.add') }}">Add Food</a>
    @endcan
    <div class="row row-cols-1 row-cols-md-3">
        @foreach ($menu as $m)
        <div class="col mb-4">
                <div class="card" style="margin:10px;width: 18rem;">
                    <img src="{{ asset('images/' . $m->img_path) }}" class="card-img-top"
                    alt="{{ $m->foodName . ' picture' }}" width="200" height="250">
                    <div class="card-body">
                        <h5 class="card-title">{{ $m->foodName }}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Price: Rs {{ $m->price }}</li>
                        <li class="list-group-item">
                            @if ($m->is_veg)
                                Veg
                            @else
                                NonVeg
                            @endif
                        </li>
                    </ul>
                    @can('menu_delete')
                        <div class="card-body">
                            {{-- @if (\Illuminate\Support\Facades\Auth::user())
                    <a href="{{route('review',['id'=>$m->id])}}" class="card-link ">Review</a>
                @endif --}}
                            <a href="{{ route('menu.delete', ['id' => $m->id]) }}" class="card-link">Delete</a>
                            <a href="{{ route('menu.edit', ['id' => $m->id]) }}" class="card-link">Edit</a>
                        </div>
                    @endcan
                    {{-- @if (\Illuminate\Support\Facades\Auth::user()) --}}
                    <div class="card-body">
                        <a href="{{ route('review', ['id' => $m->id]) }}" class="card-link bg-warning">Review</a>
                    </div>
                    {{-- @endif --}}
                </div>           
            </div>
    @endforeach
</div>
@endsection
