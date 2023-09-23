@extends('layout.base')
@section('title', 'Manajemen User')
@section('content')
    <div class="container-fluid px-4">

        <div class="d-flex w-100 justify-content-between">
            <div class="align-self-center">
                <h1 class="mt-4">User</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Manajemen User</li>
                </ol>
            </div>

            <div class="align-self-center">
                <a href="{{ route('users.create') }}" class="btn btn-primary">TAMBAH</a>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                List User
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{!!  $user->ref_role != null ? $user->ref_role->nama == "ADMIN" ? '<div class="badge bg-primary">'.$user->ref_role->nama.'</div>' : '<div class="badge bg-secondary">'.$user->ref_role->nama.'</div>' : ""  !!}</td>
                            <td class="d-flex">
                                <a class="btn btn-sm btn-success" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                      style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
