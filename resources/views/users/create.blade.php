@extends('layout.base')
@section('title', 'Manajemen User')
@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex w-100 justify-content-between">
            <div class="align-self-center">
                <h1 class="mt-4">Tambah User</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Manajemen User</li>
                </ol>
            </div>
        </div>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" id="role" name="role" required>
                    <option value="" disabled selected>Pilih Category</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="d-flex justify-content-between mt-5">
                <a class="btn btn-secondary" href="{{url('users')}}">KEMBALI</a>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
        </form>
    </div>
@endsection
