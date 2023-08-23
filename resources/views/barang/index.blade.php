@extends('layout.base')
@section('title', 'Manajemen Barang')
@section('content')
    <div class="container-fluid px-4">

        <div class="d-flex w-100 justify-content-between">
            <div class="align-self-center">
                <h1 class="mt-4">Barang</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Manajemen Barang</li>
                </ol>
            </div>

            <div class="align-self-center">
                <a class="btn btn-primary">TAMBAH</a>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                List Barang
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Rinso Cair 250ML</td>
                        <td>19.000</td>
                        <td>30</td>
                        <td>
                            <a class="btn btn-sm btn-success">Edit</a>
                            <a class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Pepsodent 300ml</td>
                        <td>11.000</td>
                        <td>20</td>
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
