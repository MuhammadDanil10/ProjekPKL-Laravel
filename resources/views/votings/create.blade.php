@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<div class="container">
<form action="{{ route('votings.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3 mt-5">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group mb-3">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="form-group mb-3">
        <label for="photo">Photo</label>
        <input type="file" name="photo" class="form-control-file" required>
    </div>
    <button type="submit" class="btn btn-primary mb-5">Submit</button>
</form>
</div>
@endsection
