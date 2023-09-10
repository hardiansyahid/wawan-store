<?php

namespace App\Http\Controllers;

use App\Models\MstReferenceModel;
use Illuminate\Http\Request;

class MstReferenceController extends Controller
{
    public function index()
    {
        $references = MstReferenceModel::all();
        return view('references.index', compact('references'));
    }

    public function create()
    {
        return view('references.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category' => 'required',
            'nama' => 'required',
            'code' => 'required',
            'isactive' => 'required',
        ]);

        MstReferenceModel::create($validatedData);

        return redirect()->route('references.index')
            ->with('success', 'Reference created successfully.');
    }

    public function edit(MstReferenceModel $reference)
    {
        return view('references.edit', compact('reference'));
    }

    public function update(Request $request, MstReferenceModel $reference)
    {
        $validatedData = $request->validate([
            'category' => 'required',
            'nama' => 'required',
            'code' => 'required',
            'isactive' => 'required',
        ]);

        $reference->update($validatedData);

        return redirect()->route('references.index')
            ->with('success', 'Reference updated successfully.');
    }

    public function destroy(MstReferenceModel $reference)
    {
        $reference->delete();

        return redirect()->route('references.index')
            ->with('success', 'Reference deleted successfully.');
    }
}
