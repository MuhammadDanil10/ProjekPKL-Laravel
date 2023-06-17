<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $voting->name }}</title>
</head>
<style>
@media only screen and (max-width: 600px) {
  .foto{
    width: 90%;
    height: 90%;
  }
}
</style>
<body>
    @include('layouts.mainNavbar')
    <div class="container mt-5">
        <div class="card mt-5" style="margin-bottom: 15vh">
            <div class="card-header">
                <h2 class="card-title" >{{ $voting->name }}</h2>
            </div>
            <div class="card-body">
                <img src="{{ asset('photos/' . $voting->photo) }}" class="foto rounded mx-auto d-block mt-3" width="40%" height="40%" alt="{{ $voting->name }}">
                <div class="container mt-5 w-75">
                <p class="card-text font-bold" style="text-align:justify;">VISI: {{ $voting->visi }}</p> 
                <p class="card-text"  style="margin-bottom: 10vh; text-align:justify;">MISI: {{$voting->misi}}</p>
                <h4 class="h4 font-bold text-center">BIODATA</h4>
                <p class="card-text text-center"  style="margin-bottom: 1vh; font-weight:bolder;">NAMA:</p> <p class="card-text text-center">{{$voting->name}}</p>
                <p class="card-text text-center"  style="margin-bottom: 1vh; font-weight:bolder;">UMUR  :</p><p class="card-text text-center">{{$voting->umur}}</p>
                <p class="card-text text-center"  style="margin-bottom: 1vh; font-weight:bolder;">ALAMAT:</p><p class="card-text text-center">{{$voting->alamat}}</p>
                <p class="card-text text-center"  style="margin-bottom: 1vh; font-weight:bolder;">HOBI:</p><p class="card-text text-center">{{$voting->hobi}}</p>
                <p class="card-text text-center"  style="margin-bottom: 1vh; font-weight:bolder;">JABATAN SEBELUMNYA:</p><p class="card-text text-center">{{$voting->jabatan_lama}}</p>
                <p class="card-text text-center"  style="margin-bottom: 1vh; font-weight:bolder;">MOTIVASI:</p><p class="card-text text-center">{{$voting->motivasi}}</p>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footerUser')
</body>
</html>