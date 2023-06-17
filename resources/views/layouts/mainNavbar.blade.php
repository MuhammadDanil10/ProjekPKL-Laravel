<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

  <!-- Scripts -->
  @viteReactRefresh
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <style>
    @media only screen and (max-width: 600px) {
    .nav-link{
      color: #145DA0
    }
  }
  </style>
  
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark p-3" style="background-color: #145DA0">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{route('welcome')}}">E-Voting</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto ">
            <li class="nav-item">
              <a class="nav-link mx-2 active" aria-current="page" href="{{route('welcome')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2 active" href="https://api.whatsapp.com/send?phone=6282237943100&text=Hola%20este%20es%20el%20mensaje">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2 active" href="https://linktr.ee/kukicha">Help</a>
            </li>
            @guest
            @if (Route::has('login'))
              <li class="nav-item">
                <a class="nav-link mx-2 active" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
            @endif
          @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle mx-2 active" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a>
  
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                  Dahboard
                </a>
                <a class="dropdown-item " href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                   </i>Logout
                </a>
  
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </li>
          @endguest
          </ul>
          <ul class="navbar-nav ms-auto d-none d-lg-inline-flex">
            {{-- right menu --}}
          </ul>
        </div>
      </div>
    </nav>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-GBjvO1Bz3PbDMThsHT46H6J6nbVjVH1jM6QQ5Gy5vDqyFlzRlIqqZDWKYVv2d7HK" crossorigin="anonymous"></script>
</body>
</html>
