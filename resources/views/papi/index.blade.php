<!-- resources/views/papi/index.blade.php -->
@extends('layouts.backend.app')

@section('content')
<div class="container">
    <h1>Daftar Data PAPI</h1>
    <a href="{{ route('papi.create') }}" class="btn btn-primary mb-3">Tambah Data PAPI</a>
    <a href="{{ route('papi.test') }}" class="btn btn-secondary mb-3">View Test</a>
    <a href="{{ route('papi.report') }}" class="btn btn-warning mb-3">Result</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>No Pendaftaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($papiItems as $papi)
                <tr>
                    <td>{{ $papi->id }}</td>
                    <td>{{ $papi->no_pendaftaran }}</td>
                    <td>
                        <a href="{{ route('papi.show', $papi->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('papi.edit', $papi->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('papi.destroy', $papi->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
