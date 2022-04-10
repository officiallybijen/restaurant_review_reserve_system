@extends('layouts.app')
@section('title')
@endsection
@section('body')
    <div class="container py-5" style="margin-top: 30px;">

        <div class="row">
            <div class="col-md-5">
                {{-- start slider --}}
                @if (sizeof($menuImage) == 0)
                    <img src="{{ asset('images/' . $menu->img_path) }}" height="500px" width="600px" alt=""
                        style="object-fit: cover; border-radius: 10%; box-shadow: 7px 7px rgba(228, 102, 102, 0.788);">
                @else
                    <div id="carouselExampleControls" style="border-radius: 10%;box-shadow: 7px 7px rgba(228, 102, 102, 0.788);" class="carousel slide text-light" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active"
                                style="border-radius: 10%; background-image: url({{ asset('images/' . $menu->img_path) }});height: 500px; background-size: cover;">
                            </div>
                            @foreach ($menuImage as $mi)
                                <div class="carousel-item"
                                    style="border-radius: 10%;background-image: url({{ asset('images/' . $mi->img_path) }});height: 500px; background-size: cover;">
                                </div>
                            @endforeach
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    {{-- end slider --}}
                @endif
            </div>

            <div class="col-md-2"></div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-3"><h5 class="card-title">{{ $menu->foodName }}</h5>
                        <h5 class="card-title">Rs {{ $menu->price }}</h5></div>
                        <div class="col-md-3"></div>
                    <div class="col-md-6"><h5 class="card-title">Rate:
                        <div style="color: rgba(202, 176, 30, 0.637)">
                        @switch(floor($avg_rate))
                        @case(1)
                            <p><i class="fa-solid fa-star"><i class="fa-regular fa-star"></i><i
                                        class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i
                                        class="fa-regular fa-star"></i></i>
                        @break

                        @case(2)
                            <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"><i
                                        class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i
                                        class="fa-regular fa-star"></i></i>
                        @break

                        @case(3)
                            <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"><i class="fa-regular fa-star"></i><i
                                        class="fa-regular fa-star"></i></i>
                        @break

                        @case(4)
                            <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"><i
                                        class="fa-regular fa-star"></i></i>
                        @break

                        @case(5)
                            <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i>
                        @break
                        @default
                    @endswitch
                </div>
                    <span style="font-size: 16px">({{$totalNum}} reviews)</span></p>
                    </h5></div>
                </div>
                <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque nisi
                    delectus labore maxime excepturi
                    consequatur, nulla consectetur facilis, dolor quos sunt odit reprehenderit? Laudantium similique vitae,
                    omnis incidunt recusandae vero. Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet odit
                    commodi nihil eos pariatur enim quis delectus, reiciendis unde distinctio quisquam nemo? Facilis
                    repellat quibusdam consectetur laborum nostrum esse quis! Lorem ipsum dolor sit amet consectetur
                    adipisicing elit. Placeat dolor rem officiis repellat repudiandae laboriosam neque! Officiis porro
                    culpa, quo iusto fugiat consectetur a voluptas temporibus unde! Repudiandae, aliquid? Esse!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio molestias praesentium atque optio
                    earum et. Tenetur nemo distinctio ullam id. Necessitatibus ipsam sequi ea quae cum aspernatur, fuga
                    numquam itaque.</p>
                @can('review')
                    @if ($can == true)
                        <a style="font-size: 20px;text-decoration: none;" href="#fun" data-toggle="modal"
                            data-target="#modalRate">Rate</a>
                    @endif
                @endcan
            </div>
        </div>
        <div style="margin-top: 50px;">
            <h3>Reviews:</h3>
            @if (sizeof($review) == 0)
                <h6>No reviews </h6>
            @endif
            @foreach ($review as $item)
                <div style="margin-top: 10px;">
                    {{-- main div for comment section --}}
                    <div class="whole" style="display: flex;">
                        <div>
                            <img src="{{ asset('images/default_pp.jpg') }}" width="100px" height="100px" background
                                style="border-radius: 50%" />
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                {{ $item->user->name }}
                                @can('comment_manage', $item)
                                    <br><span><a href="#">Edit</a></span> <span><a href="#">Delete</a></span>
                                @endcan
                                @switch($item->rate)
                                    @case(1)
                                        <p><i class="fa-solid fa-star"><i class="fa-regular fa-star"></i><i
                                                    class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i
                                                    class="fa-regular fa-star"></i></i></p>
                                    @break

                                    @case(2)
                                        <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"><i
                                                    class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i
                                                    class="fa-regular fa-star"></i></i></p>
                                    @break

                                    @case(3)
                                        <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                                class="fa-solid fa-star"><i class="fa-regular fa-star"></i><i
                                                    class="fa-regular fa-star"></i></i></p>
                                    @break

                                    @case(4)
                                        <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"><i
                                                    class="fa-regular fa-star"></i></i></p>
                                    @break

                                    @case(5)
                                        <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                                class="fa-solid fa-star"></i></p>
                                    @break

                                    @default
                                @endswitch

                                <div>{{ $item->comment }}</div>
                            </blockquote>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- @foreach ($review as $item)
        <h5>Review by: {{ $item->user->name }}</h5>
        <h5>{{ $item->comment }}</h5>
        <h5>Rate: {{ $item->rate }}</h5><br><br>
    @endforeach --}}
    </div>

    <!-- Modal Rating-->
    <div class="modal fade" id="modalRate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('review.store', ['menu_id' => $menu->id]) }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Rate</label><br>

                            <input type="radio" name="rate" value="1">1
                            <input type="radio" name="rate" value="2">2
                            <input type="radio" name="rate" value="3">3
                            <input type="radio" name="rate" value="4">4
                            <input type="radio" name="rate" value="5">5
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Comment: </label><br>
                            <textarea cols="60" rows="3" name="comment"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Rating Modal --}}
@endsection
