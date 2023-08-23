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
                <a class="btn btn-primary">TAMBAH</a>
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
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aktif</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aktif</th>
                        <th>Aksi</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>admin</td>
                            <td>
                                <div class="badge bg-primary">admin</div>
                            </td>
                            <td><i class="fas fa-check"></i></td>
                            <td>
                                <a class="btn btn-sm btn-success">Edit</a>
                                <a class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <tr>
                            <td>kasir1</td>
                            <td>
                                <div class="badge bg-secondary">kasir</div>
                            </td>
                            <td><i class="fas fa-check"></i></td>
                            <td>
                                <a class="btn btn-sm btn-success">Edit</a>
                                <a class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
