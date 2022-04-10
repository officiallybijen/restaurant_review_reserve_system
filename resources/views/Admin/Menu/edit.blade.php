@extends('layouts.app')
@section('title')
    Edit Menu
@endsection
@section('body')
    <div style="margin: 60px 30px;">
        <h3>
            <ul>
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </h3>
        <form action="{{ route('menu.update', ['id' => $menu->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="foodName" class="form-label">Food Name:</label>
                <input type="text" name="foodName" class="form-control" value="{{ $menu->foodName }}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="text" name="price" class="form-control" value="{{ $menu->price }}">
            </div>
            <div>
                <label for="is_veg" class="form-label">Type:</label>

                <input class="form-check-input" type="radio" name="is_veg" value=1
                    @if ($menu->is_veg) checked @endif>
                <label class="form-check-label" for="veg">
                    Veg
                </label>
                <input class="form-check-input" type="radio" name="is_veg" value=0
                    @if (!$menu->is_veg) checked @endif>
                <label class="form-check-label" for="nonveg">
                    Non-Veg
                </label>
            </div>
            <div class="mb-3">
                <label for="img_path" class="form-label">Select a image:</label>
                <img src="{{ asset('images/' . $menu->img_path) }}" alt="prev picture" width="150px">
                <input type="file" name="img_path" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
