@extends('layouts.appLayout')
@section('konten')
<div class="container p-3">
    @if ($voting !== null)
    <a href="{{ route('zeta.export', ['votingId' => $voting->id]) }}" class="btn btn-primary">Download Data {{ $voting->name }}</a>
@endif
 </div>
<table class="table table-striped table-hover">
    
    <tr>
        <th>No</th>
        <th>ID</th>
        <th>Nama</th>
        <th>NISN</th>
        <th>Status</th>
    </tr>
    @php
        $no = 1;
    @endphp
    @if ($data !== null)
    @foreach ($data as $user)
        @if ($user->status == 1 || $user->status == 2 || $user->status == 3 || $user->status == 4 || $user->status == 5 || $user->status == 6 || $user->status == 7 || $user->status == 8 || $user->status == 9|| $user->status == 10)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->nisn }}</td>
                <td>{{ $user->status }}</td>
            </tr>
        @endif
    @endforeach
    @endif
</table>

@endsection