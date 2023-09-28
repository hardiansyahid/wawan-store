@extends('layout.base')
@section('title', 'Tambah Penjualan')

@section('content')
    <div class="container-fluid px-4">

        <div class="d-flex w-100 justify-content-between">
            <div class="align-self-center">
                <h1 class="mt-4">Report Penjualan</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Manajemen Penjualan</li>
                </ol>
            </div>

            <form class="align-self-center" action="{{url('penjualan/report')}}" method="GET">
                @csrf
                @method("GET")
                <div class="d-flex">
                    <div class="mx-2 align-self-center">
                        <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{$tanggal}}">
                    </div>
                    <div class="mx-2 align-self-center">
                        <button type="submit" class="btn btn-primary">TAMPILKAN</button>
                    </div>
                </div>
            </form>
        </div>

        @if(count($report) > 0)
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Tanggal</th>
                    <th>Detail Barang</th>
                    <th>Total Bayar</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $totalTransaksiHarian = 0;
                @endphp

                @foreach($report as $dataReport)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$dataReport->kode}}</td>
                        <td>{{\App\Helper\Helper::dateFormat($dataReport->tanggal)}}</td>
                        <td>
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
                                <tbody id="rowBarangPenjualan">
                                @foreach($dataReport->ref_detailTransaksi as $reportDetail)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$reportDetail->ref_barang->nama}}</td>
                                        <td>{{$reportDetail->harga}}</td>
                                        <td>{{$reportDetail->jumlah}}</td>
                                        <td class="text-end">{{\App\Helper\Helper::currency($reportDetail->total)}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </td>
                        <td class="text-end align-items-end">{{\App\Helper\Helper::currency($dataReport->total_bayar)}}</td>
                    </tr>
                    @php
                        $totalTransaksiHarian += $dataReport->total_bayar;
                    @endphp
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="4" class="bg-secondary text-white font-weight-bold">TOTAL</td>
                    <th class="text-end">{{\App\Helper\Helper::currency($totalTransaksiHarian)}}</th>
                </tr>
                </tfoot>
            </table>
        @else
            <div class="alert alert-primary" role="alert">
                <h4 class="alert-heading">Data Tidak Ditemukan</h4>
                <hr>
                <p>Data transaksi tidak tersedia ditanggal {{$tanggal}}</p>
            </div>
        @endif

        <div class="d-flex justify-content-end mt-5">
            <a class="btn btn-secondary" href="{{url('penjualan')}}">KEMBALI</a>
        </div>
    </div>
@endsection
