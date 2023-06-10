@extends('layouts.appLayout')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">{{ __('Edit Voting') }}</div>

                <div class="card-body">
                    <form action="{{ route('votings.update', $voting->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $voting->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="visi">Visi</label>
                            <textarea class="form-control" name="visi" id="visi" required>{{ $voting->visi }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="misi">Misi</label>
                            <textarea class="form-control" name="misi" id="misi" required>{{ $voting->misi }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control-file" name="photo" id="photo">
                        </div>

                        <div class="form-group">
                            <label for="umur">Umur</label>
                            <input type="text" class="form-control" name="umur" id="umur" value="{{ $voting->umur }}" required>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" required>{{ $voting->alamat }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="hobi">Hobi</label>
                            <input type="text" class="form-control" name="hobi" id="hobi" value="{{ $voting->hobi }}" required>
                        </div>

                        <div class="form-group">
                            <label for="jabatan_lama">Jabatan Lama</label>
                            <input type="text" class="form-control" name="jabatan_lama" id="jabatan_lama" value="{{ $voting->jabatan_lama }}" required>
                        </div>

                        <div class="form-group">
                            <label for="motivasi">Motivasi</label>
                            <textarea class="form-control" name="motivasi" id="motivasi" required>{{ $voting->motivasi }}</textarea>
                        </div>

                        <div class="form-group">
                            <img src="{{ asset('photos/' . $voting->photo) }}" alt="Voting Photo" width="200">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Voting</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
