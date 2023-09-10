@extends('layout.base')
@section('title', 'Master Reference')
@section('content')
    <div class="container-fluid px-4">

        <div class="d-flex w-100 justify-content-between">
            <div class="align-self-center">
                <h1 class="mt-4">Reference</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Master Reference</li>
                </ol>
            </div>

            <div class="align-self-center">
                <a class="btn btn-primary" href="{{ route('references.create') }}">TAMBAH</a>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                List Reference
            </div>
            <div class="card-body">
                @if ($references->isEmpty())
                    <p>Data tidak tersedia</p>
                @else
                    <table id="datatablesSimple" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Aktif</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($references as $reference)
                            <tr>
                                <td>{{ $reference->category }}</td>
                                <td>{{ $reference->nama }}</td>
                                <td>{{ $reference->code }}</td>
                                <td>{{ $reference->isactive ? '<i class="fas fa-check"></i>' : '<i class="fas fa-check"></i>' }}</td>
                                <td>
                                    <a href="{{ route('references.edit', $reference->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('references.destroy', $reference->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
