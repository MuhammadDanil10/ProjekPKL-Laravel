@extends('layouts.appLayout')

@section('konten')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <div class="container">
        <div class="h3 card-header">{{ __('Data User') }} <br>
            <span class="h6">
                @if (Auth::user()->role != 0)
                <a href="{{route('admin.users')}}"><button class="btn btn-primary btn-sm">Tambah Data</button></a>
                @else
                <a href="{{route('admin.users')}}"><button class="btn btn-primary btn-sm" disabled>Tambah Data</button></a>   
                @endif
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Import Excel
                </button>

                <a href="{{ route('download', ['file' => 'template.xlsx']) }}" class="btn btn-warning btn-sm">Unduh Template</a>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Import Excel</h1>
                    </div>
                    <form action="{{route('importExcel')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form--group">
                            <input type="file" name="file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div> 
                    </div>
                    </form>
                </div>
                </div>
            </span></div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>NISN</th>
                    <th>Role</th>
                    <th>Status</th>
                    @if (Auth::user()->role != 0)
                        <th>Aksi</th>
                    @else
                        
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $users)
                    <tr>
                        <td>{{ $users->name }}</td>
                        <td>{{ $users->nisn }}</td>
                        <td>{{ $users->role }}</td>
                        <td>{{ $users->status}}</td>
                        @if (Auth::user()->role != 0)
                            <td>
                                <a href="{{ route('admin.editUser', $users->id) }}" class="btn btn-primary btn-xs">Edit</a>
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
        {{ $user->links() }}
        </div>
@endsection
