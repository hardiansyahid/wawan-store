@extends('layout.base')
@section('title', 'Tambah Penjualan')

@section('content')
    <div class="container-fluid px-4">

        <div class="d-flex w-100 justify-content-between">
            <div class="align-self-center">
                <h1 class="mt-4">Detail Penjualan</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Manajemen Penjualan</li>
                </ol>
            </div>
        </div>

        <table class="table table-primary table-striped w-50">
            <thead>
                <tr>
                    <th>KODE TRANSAKSI</th>
                    <th>{{$detail->kode}}</th>
                </tr>
                <tr>
                    <th>TANGGAL</th>
                    <th>{{\App\Helper\Helper::dateFormat($detail->tanggal)}}</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <table class="table table-bordered table-striped" id="tableBarangPenjualan">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="4">TOTAL BAYAR</td>
                    <td id="totalBayar">{{$detail->total_bayar}}</td>
                </tr>
            </tfoot>
            <tbody id="rowBarangPenjualan">
                @foreach($detail->ref_detailTransaksi as $detail)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$detail->ref_barang->nama}}</td>
                        <td>{{$detail->harga}}</td>
                        <td>{{$detail->jumlah}}</td>
                        <td>{{$detail->total}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end mt-5">
            <a class="btn btn-secondary" href="{{url('penjualan')}}">KEMBALI</a>
        </div>
    </div>
@endsection
