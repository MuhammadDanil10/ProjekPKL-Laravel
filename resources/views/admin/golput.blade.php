@extends('layouts.appLayout')

@section('konten')
    <div class="container">
        <div class="h3 card-header">{{ __('Data User') }} <br>
            <span class="h6">
                @if (Auth::user()->role != 0)
                <a href="{{route('admin.users')}}"><button class="btn btn-primary btn-sm">Tambah Data</button></a>
                @else
                <a href="{{route('admin.users')}}"><button class="btn btn-primary btn-sm" disabled>Tambah Data</button></a>   
                @endif
                <a href="{{route('export')}}" class="btn btn-info btn-sm">Export PDF</a>
            </span></div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>NISN</th>
                    <th>Role</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $users)
                    <tr>
                        <td>{{ $users->name }}</td>
                        <td>{{ $users->nisn }}</td>
                        <td>{{ $users->role }}</td>
                        <td>{{ $users->status}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
        </div>
@endsection