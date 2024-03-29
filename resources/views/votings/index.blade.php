<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <style>
            .description {
                max-height: 98px;
                overflow: hidden;
            }
            

            
        </style>
</head>
<body>
@include('layouts.mainNavbar')
</div>
    <div class="container" style="margin-bottom: 20vh">
        <h3 class="h3 text-center mb-3 mt-5">{{ __('You are logged in!') }} {{ Auth::user()->name }}</h3>
        <h4 class="h4 text-center mb-5 mt-3" style="font-weight: bold; font-size:x-large;">Daftar Voting</h4>
        @if(count($votings) > 0)
            <div class="row">
                @foreach($votings as $voting)
                    <div class="col-md-4 mb-4">
                        <div class="card" style="box-shadow: 9px 12px 25px -8px rgba(0,0,0,0.46);
                        -webkit-box-shadow: 9px 12px 25px -8px rgba(0,0,0,0.46);
                        -moz-box-shadow: 9px 12px 25px -8px rgba(0,0,0,0.46);">
                            <img src="{{ asset('photos/' . $voting->photo) }}" class="card-img-top" alt="{{ $voting->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $voting->name }}</h5>
                                <div class="card-text description" id="description_{{ $voting->id }}">
                                    <p>{{ $voting->visi }}</p>
                                </div>                       
                                <a href="{{ route('votings.show', $voting->id) }}" class="readMoreLink" data-id="{{ $voting->id }}">Read More</a><br>
                                @php
                                    $allowedStatuses = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
                                @endphp

                                @unless(in_array(auth()->user()->status, $allowedStatuses))
                                <form action="{{ route('votings.vote', $voting->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary mt-3 ">Vote</button>
                                </form>
                                @endunless  
                                {{-- @if(Auth::user()->status != 1 )
                                <form action="{{ route('votings.vote', $voting->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary mt-3 ">Vote</button>
                                </form>
                                @else
                                    <button class="btn btn-primary mt-3" disabled>Voted</button>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
    </div>
@include('layouts.footerUser')
</body>
</html>