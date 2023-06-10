@extends('layouts.appLayout')
@section('konten')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">{{ __('Input Kandidat') }}</div>

                <div class="card-body">
                    <form action="{{ route('votings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>

                        <div class="form-group">
                            <label for="visi">VISI</label>
                            <textarea name="visi" id="visi" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="misi">MISI</label>
                            <textarea name="misi" id="misi" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="umur">Umur</label>
                            <input type="text" class="form-control" name="umur" id="umur" required>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" required>
                        </div>

                        <div class="form-group">
                            <label for="hobi">Hobi</label>
                            <input type="text" class="form-control" name="hobi" id="hobi" required>
                        </div>

                        <div class="form-group">
                            <label for="jabatan_lama">Jabatan Lama</label>
                            <input type="text" class="form-control" name="jabatan_lama" id="jabatan_lama" required>
                        </div>

                        <div class="form-group">
                            <label for="motivasi">Motivasi</label>
                            <textarea name="motivasi" id="motivasi" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" name="photo" class="form-control-file" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
