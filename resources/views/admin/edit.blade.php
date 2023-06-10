@extends('layouts.appLayout')

@section('konten')
    <div class="container">
        
        <div class="card-header">{{ __('Edit User') }}</div>
        <div class="card-body">
        <form action="{{ route('admin.updateUser', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3 form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>

            <div class="mb-3 form-group">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $user->nisn }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        </div>
        </div>
    </div>
@endsection
