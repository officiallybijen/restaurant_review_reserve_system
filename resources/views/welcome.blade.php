@extends('layouts.app')
@section('body')
    <!DOCTYPE html>
    <html>

    <head>
        <style>
            .jpt {
                min-height: 600px;
                background-attachment: fixed;
                object-fit: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                background-image: url({{ asset('images/cover1.jpg') }});
            }

        </style>
    </head>

    <body>
        <div style="background: black;">
            <div class="jpt" style="font-size: 50px;display: flex;justify-content: center;align-items: center;">
                <div style="color: white;opacity: 1;">
                    <h1 style="text-shadow: 3px 3px #b17e5e;">Welcome to the restaurant</h1>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>
        <div class="container" style="margin: auto;width: 800px;">
            <div class="row">
                <div class="col-md-5"
                    style="box-shadow: 5px 4px rgb(100, 95, 95);border-radius: 2%;background-image: url({{ asset('images/chop.jpg') }});background-size: cover;">

                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5" style="text-align: justify;font-family: 'Exo 2', sans-serif;">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
        <br><br>
        {{-- start slider --}}
        <div id="carouselExampleControls" class="carousel slide text-light" data-bs-ride="carousel">
            <div class="carousel-inner"
                style="background-image: url({{ asset('images/poru.jpg') }});height: 500px;background-position: 50% 30%; background-attachment: fixed; background-size: cover;">
                <div class="carousel-item active ">
                    <div class="text-center">
                        <div>
                            <p style="font-size: 40px; font-family: cursive;">
                                <span style="border-bottom: 5px solid rgb(223, 223, 223);">Menu:</span>
                            </p>
                            <ul
                                style="list-style: none;font-size: 25px; font-family: cursive;line-height: 100px;margin: 0;padding: 0;">
                                @for ($i = 0; $i < 3; $i++)
                                    <li><a class="text-light" style="text-decoration: none;"
                                            href="{{ route('review', ['id' => $menu[$i]->id]) }}">{{ $menu[$i]->foodName }}</a>
                                    </li>
                                @endfor

                                {{-- @foreach ($menu as $m)
                                    <li><a href="{{route('review',['id'=>$m->id])}}">{{$m->foodName}}</a></li>    
                                @endforeach --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="text-center">
                        <div>
                            <p style="font-size: 40px; font-family: cursive;">
                                <span style="border-bottom: 5px solid rgb(223, 223, 223);">Menu:</span>
                            </p>
                            <ul
                                style="list-style: none;font-size: 25px; font-family: cursive;line-height: 100px;margin: 0;padding: 0;">
                                @for ($i = 3; $i < 6; $i++)
                                    @if (isset($menu[$i]))
                                        <li><a class="text-light" style="text-decoration: none;"
                                                href="{{ route('review', ['id' => $menu[$i]->id]) }}">{{ $menu[$i]->foodName }}</a>
                                        </li>
                                    @endif
                                @endfor

                                {{-- @foreach ($menu as $m)
                                    <li><a href="{{route('review',['id'=>$m->id])}}">{{$m->foodName}}</a></li>    
                                @endforeach --}}
                            </ul>
                        </div>
                    </div>
                </div>
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
        <br><br>
        <div class="container" style="margin: auto;">
            <div class="row">
                <div class="col-md-5"
                    style="box-shadow: 3px 7px grey;text-align: justify;font-family: cursive;color: rgb(146, 133, 16); font-size: 20px;">
                    <p><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor culpa qui officia deserunt mollit anim id est laborum.
                        proident, sunt in culpa qui officia deserunt mollit elit, sed do eiusmod Lorem ipsum dolor sit amet,
                        consectetur adipisicing elit. Non doloremque error nobis nesciunt saepe? Libero at ad voluptas amet,
                        accusamus eius inventore magni odit ex natus eligendi sunt, minima dignissimos?anim id est laborum.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet,
                        consectetur adipisicing elit. Non doloremque error nobis nesciunt saepe? Libero at ad voluptas amet,
                        accusamus eius inventore magni odit ex natus eligendi sunt, minima dignissimos?
                        tempor incididunt ut labore et dolore. lorem</p>
                    <p class="text-end">Santosh Maharjan<br>Head Chef</p>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5"
                    style="box-shadow: 5px 5px rgb(13, 167, 214);border-radius: 50%;background-image: url({{ asset('images/nepChefEdited.jpg') }}); background-size: cover; ">

                </div>

            </div>

            <br><br>
            <div>
                <div class="row" style="margin: auto;height: 500px;">
                    <div class="col-md-7" style="margin-top: 40px;text-align: center;">
                        <p style="line-height: 3rem; letter-spacing:2px;font-size: 20px;">
                            Contact-info:<br>
                            Email:nccsbijen@gmail.com <br>
                            Mobile:9861523063 <br>
                        </p>
                    </div>
                    <div class="col-md-5">
                        <p style="line-height: 3rem; letter-spacing:2px;font-size: 20px;">
                            Location:
                        </p>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14129.336256288883!2d85.30429766904462!3d27.70697009811239!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18f857c1fdf5%3A0x6f9b2025e525e92!2sNardevi%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1646657904305!5m2!1sen!2snp"
                            width=auto height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- <div class="jpt2" style="display: flex; justify-content: center; align-items: center;">
                          <div class="text-center" >
                           <div>
                            <p style="font-size: 40px; font-family: cursive;">
                            Fried Items:<br>
                            -----------------
                            </p>
                            <ul style="list-style: none;font-size: 25px; font-family: cursive;line-height: 100px;margin: 0;padding: 0;">
                             <li>Momo</li>
                             <li>Momo</li>
                             <li>Momo</li>
                             

                            </ul>
                           </div>
                          </div>
                         </div> -->

        <br><br>

    </body>

    </html>
@endsection
