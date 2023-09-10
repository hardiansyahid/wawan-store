@extends('layout.base')
@section('title', 'Manajemen Barang - Tambah Barang')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Barang</h1>
        <form action="{{ route('barang.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Expired</label>
                <input type="date" class="form-control" id="expired" name="expired" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category" required>
                    <option value="" disabled selected>Pilih Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-between mt-5">
                <a class="btn btn-secondary" href="{{url('barang')}}">KEMBALI</a>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
        </form>
    </div>
@endsection
