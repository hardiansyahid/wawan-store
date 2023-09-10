@extends('layout.base')
@section('title', 'Master Reference')
@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex w-100 justify-content-between">
            <div class="align-self-center">
                <h1 class="mt-4">Edit References</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Master References</li>
                </ol>
            </div>
        </div>

        <form action="{{ route('references.update', $reference->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="{{ $reference->category }}" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Name</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $reference->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" class="form-control" id="code" name="code" value="{{ $reference->code }}" required>
            </div>
            <div class="mb-3">
                <label for="isactive" class="form-label">Is Active</label>
                <select class="form-select" id="isactive" name="isactive" required>
                    <option value="1" {{ $reference->isactive ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ !$reference->isactive ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <div class="d-flex justify-content-between mt-5">
                <a class="btn btn-secondary" href="{{url('references/index')}}">KEMBALI</a>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
        </form>
    </div>
@endsection
