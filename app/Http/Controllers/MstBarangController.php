<?php

namespace App\Http\Controllers;
use App\Models\MstBarangModel;
use App\Models\MstReferenceModel;
use Illuminate\Http\Request;

class MstBarangController extends Controller
{
    public function index()
    {
        $barangs = MstBarangModel::with('ref_category')->get();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        $categories = MstReferenceModel::where('category', 'BARANG')->get();
        return view('barang.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'category' => 'required',
            'expired' => 'required',
        ]);

        MstBarangModel::create($validatedData);

        return redirect()->route('barang.index')
            ->with('success', 'Barang created successfully.');
    }

    public function edit(MstBarangModel $barang)
    {
        $categories = MstReferenceModel::where('category', 'BARANG')->get();
        return view('barang.edit', compact('barang', 'categories'));
    }

    public function update(Request $request, MstBarangModel $barang)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'category' => 'required',
            'expired' => 'required',
        ]);

        $barang->update($validatedData);

        return redirect()->route('barang.index')
            ->with('success', 'Barang updated successfully.');
    }

    public function destroy(MstBarangModel $barang)
    {
        $barang->delete();

        return redirect()->route('barang.index')
            ->with('success', 'Barang deleted successfully.');
    }

    public static function handlePenguranganStok($barangId, $stok) {
        $barang = MstBarangModel::find($barangId);

        if (!$barang) throw new \Exception("Barang tidak ditemukan");
        if ($stok > $barang->stok) throw new \Exception("Stok tidak mencukupi");

        if ($barang->stok === 0) {
            throw new \Exception("Stok kosong");
        }else{
            $updatedStok = $barang->stok - $stok;
            $barang->stok = $updatedStok;

            $barang->save();
        }

    }
}
