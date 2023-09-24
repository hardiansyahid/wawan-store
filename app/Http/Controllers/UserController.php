<?php

namespace App\Http\Controllers;

use App\Models\MstReferenceModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('ref_role')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = MstReferenceModel::where('category', 'ROLE')->get();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
        ]);

        $request->password = Hash::make($request->password);
        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        $roles = MstReferenceModel::where('category', 'ROLE')->get();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'username' => 'required|unique:users,username,' . $user->id,
            'password' => 'required',
        ]);

        // Update data di database
        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        // Hapus user dari database
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}
