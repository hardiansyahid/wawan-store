<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\DetailTransaksi;
use App\Models\MstBarangModel;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PenjualanController extends Controller
{
    public function index(){
        $transaksi = Transaksi::all();
        return view('penjualan.index', compact('transaksi'));
    }

    public function detail($id){
        $detail = Transaksi::with('ref_detailTransaksi')->where('id', $id)->first();
        return view('penjualan.detail', compact('detail'));
    }

    public function tambah(){
        $barang = MstBarangModel::with('ref_category')->get();
        return view('penjualan.tambah', compact('barang'));
    }

    public function report(Request $request){
        $tanggal = $request->tanggal;
        if ($tanggal){
            $report = Transaksi::with('ref_detailTransaksi')->where('tanggal', Helper::dateFormatDB($tanggal))->get();
        }else{
            $report = Transaksi::with('ref_detailTransaksi')->where('tanggal', Helper::dateFormatDB(now()))->get();
        }

        return view('penjualan.report', compact('report', 'tanggal'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $randomCode = strtoupper(Str::random(6));
            $timestamp = time();
            $kodeTransaksi = "TRANS-" . $timestamp . "-" . $randomCode;

            $transaksi = new Transaksi();
            $transaksi->kode = $kodeTransaksi;
            $transaksi->tanggal = now();
            $transaksi->total_bayar = $request->total_bayar;
            $transaksi->save();

            if (count($request->detailTransaksi) > 0) {
                foreach ($request->detailTransaksi as $detail) {
                    $detailTransaksi = new DetailTransaksi();
                    $detailTransaksi->barang_id = $detail['barang_id'];
                    $detailTransaksi->transaksi_id = $transaksi->id;
                    $detailTransaksi->harga = $detail['harga'];
                    $detailTransaksi->jumlah = $detail['jumlah'];
                    $detailTransaksi->total = $detail['total'];

                    MstBarangController::handlePenguranganStok($detailTransaksi->barang_id, $detailTransaksi->jumlah);

                    $detailTransaksi->save();
                }
            }

            DB::commit();
        }catch (\Exception $e){
            DB::rollback();
            return response()->json(['error' => 'Terjadi kesalahan ! ' . $e->getMessage()], 500);
        }

        return response()->json(['message' => 'Transaksi berhasil disimpan'], 200);
    }
}
