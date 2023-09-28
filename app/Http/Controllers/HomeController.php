<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        return view('home.index');
    }

    public function dashboard(Request $request){
        $tahun = $request->tahun;
        if (!$tahun) $tahun = Helper::getCurrentYear();

        $tahunListTransaksi = DB::table('transaksi')
            ->select(DB::raw('YEAR(tanggal) as tahun'))
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->get();

        $barangTerlaris = DB::table('detail_transaksi')
            ->join('mst_barang', 'detail_transaksi.barang_id', '=', 'mst_barang.id')
            ->select('mst_barang.nama', 'mst_barang.harga', DB::raw('SUM(detail_transaksi.jumlah) as total_penjualan'))
            ->whereYear('detail_transaksi.created_at', $tahun)
            ->groupBy('mst_barang.nama', 'mst_barang.harga')
            ->orderBy('total_penjualan', 'desc')
            ->limit(5)
            ->get();

        $barangKurangLaris = DB::table('detail_transaksi')
            ->join('mst_barang', 'detail_transaksi.barang_id', '=', 'mst_barang.id')
            ->select('mst_barang.nama', 'mst_barang.harga', DB::raw('SUM(detail_transaksi.jumlah) as total_penjualan'))
            ->whereYear('detail_transaksi.created_at', $tahun)
            ->groupBy('mst_barang.nama', 'mst_barang.harga')
            ->orderBy('total_penjualan', 'asc')
            ->limit(5)
            ->get();

        $totalPenjualanPerBulanTahun = DB::table('transaksi')
            ->select(
                DB::raw('YEAR(tanggal) as tahun'),
                DB::raw('MONTH(tanggal) as bulan'),
                DB::raw('SUM(total_bayar) as total_penjualan')
            )
            ->whereYear('tanggal', $tahun)
            ->groupBy('tahun', 'bulan')
            ->orderBy('tahun', 'asc')
            ->orderBy('bulan', 'asc')
            ->get();

        $labelSeries = [];
        $dataSeries = [];
        if (count($totalPenjualanPerBulanTahun) > 0){
            foreach ($totalPenjualanPerBulanTahun as $item) {
                array_push($labelSeries, Helper::getBulanNama($item->bulan)." ".$item->tahun);
                array_push($dataSeries, $item->total_penjualan);
            }
        }

        return view('home.dashboard', compact(
            'barangTerlaris',
            'barangKurangLaris',
            'tahunListTransaksi',
            'labelSeries',
            'dataSeries'
        ));
    }
}
