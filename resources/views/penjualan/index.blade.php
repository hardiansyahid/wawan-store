@extends('layout.base')
@section('title', 'Manajemen Penjualan')
@section('content')
    <div class="container-fluid px-4">

        <div class="d-flex w-100 justify-content-between">
            <div class="align-self-center">
                <h1 class="mt-4">Penjualan</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Manajemen Penjualan</li>
                </ol>
            </div>

            <div class="align-self-center">
                <a class="btn btn-primary" href="{{url('penjualan/tambah')}}">TAMBAH</a>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                List Penjualan
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Penjualan</th>
                        <th>Tanggal</th>
                        <th>Total Bayar</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode Penjualan</th>
                        <th>Tanggal</th>
                        <th>Total Bayar</th>
                        <th>Aksi</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>SELL11082023</td>
                            <td>11-08-2023</td>
                            <td>53.000</td>
                            <td>
                                <a class="btn btn-sm btn-secondary">Detail Penjualan</a>
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
