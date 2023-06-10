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
                <p class="card-text font-bold">VISI: {{ $voting->visi }}</p> 
                <p class="card-text"  style="margin-bottom: 15vh">MISI: {{$voting->misi}}</p>
                <h4 class="h4 text-center">BIODATA</h4>
                <p class="card-text"  style="margin-bottom: 5vh">NAMA: <span class="p-5">{{$voting->name}}</span></p>
                <p class="card-text"  style="margin-bottom: 5vh">UMUR  : <span class="p-5">{{$voting->umur}}</span></p>
                <p class="card-text"  style="margin-bottom: 5vh">ALAMAT: <span class="p-4">{{$voting->alamat}}</span> </p>
                <p class="card-text"  style="margin-bottom: 5vh">HOBI: <span class="p-5">{{$voting->hobi}}</span></p>
                <p class="card-text"  style="margin-bottom: 5vh">JABATAN SEBELUMNYA: <span class="p-2">{{$voting->jabatan_lama}}</span></p>
                <p class="card-text"  style="margin-bottom: 5vh">MOTIVASI: <span class="p-4">{{$voting->motivasi}}</span></p>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footerUser')
</body>
</html>