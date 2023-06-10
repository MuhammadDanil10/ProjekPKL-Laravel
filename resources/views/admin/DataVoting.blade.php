@extends('layouts.appLayout')

@section('konten')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<span class="h6">
</span>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th width="10%">Name</th>
            <th width="40%">Visi</th>
            <th width="40%">Misi</th>
            <th width="5%">Vote</th>
            @if (Auth::user()->role != 0)
                <th width="5%">Aksi</th>
            @else
                
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($votings as $users)
            <tr>
                <td>{{ $users->name }}</td>
                <td>{{ $users->visi }}</td>
                <td>{{ $users->misi }}</td>
                <td>{{ $users->votes}}</td>
                @if (Auth::user()->role != 0)
                    <td>
                        <a href="{{ route('votings.edit', $users->id) }}" class="btn btn-primary btn-xs">Edit</a>
                        <form action="{{ route('admin.deleteUser', $users->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-xs">Hapus</button>
                        </form>
                    </td>
                @else
                    
                @endif
                
            </tr>
        @endforeach
    </tbody>
</table>
{{ $votings->links() }}
@endsection