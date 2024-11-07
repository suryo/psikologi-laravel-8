<!-- resources/views/tiu/index.blade.php -->
@extends('layouts.backend.app')

@section('content')
<div class="container">
    <h1>Tiu</h1>

    <a href="{{ route('tiu.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
    <a href="{{ route('tiu.test') }}" class="btn btn-secondary mb-3">View Test</a>
    <a href="{{ route('tiu.report') }}" class="btn btn-warning mb-3">Result</a>

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
            @foreach ($tiuItems as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->no_pendaftaran }}</td>
                    <td>
                        <a href="{{ route('tiu.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('tiu.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tiu.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
