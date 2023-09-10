@php use App\Helper\Helper; @endphp
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
                <a href="{{ route('barang.create') }}" class="btn btn-primary">TAMBAH</a>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                List Barang
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Category</th>
                        <th>Expired</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($barangs as $barang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barang->nama }}</td>
                            <td>{{ $barang->harga }}</td>
                            <td>{{ $barang->stok }}</td>
                            <td>{{ $barang->ref_category->nama }}</td>
                            <td>{{ $barang->expired != null ? Helper::dateFormat($barang->expired) : "-" }}</td>
                            <td>
                                <a href="{{ route('barang.edit', $barang->id) }}"
                                   class="btn btn-sm btn-success">Edit</a>
                                <form action="{{ route('barang.destroy', $barang->id) }}" method="POST"
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
