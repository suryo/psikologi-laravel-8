{{-- resources/views/riasec/index.blade.php --}}
@extends('layouts.backend.app')

@section('content')
<div class="container">
    <h1>Data RIASEC</h1>
    <a href="{{ route('riasec.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
    <a href="{{ route('riasec.test') }}" class="btn btn-secondary mb-3">View Test</a>
    <a href="{{ route('riasec.report') }}" class="btn btn-warning mb-3">Result</a>

    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>No Pendaftaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riasecItems as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->no_pendaftaran }}</td>
                <td>
                    <a href="{{ route('riasec.show', $item->id) }}" class="btn btn-info">Lihat</a>
                    <a href="{{ route('riasec.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('riasec.destroy', $item->id) }}" method="POST" style="display:inline;">
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
