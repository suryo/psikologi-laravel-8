<!-- resources/views/tiu/create.blade.php -->
@extends('layouts.backend.app')

@section('content')
<div class="container">
    <h1>Tambah Data Tiu</h1>

    <form action="{{ route('tiu.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="no_pendaftaran">No Pendaftaran</label>
            <input type="number" name="no_pendaftaran" class="form-control" required>
        </div>

        <!-- Tambahkan input untuk jwb1 - jwb30 -->
        @for ($i = 1; $i <= 30; $i++)
            <div class="form-group">
                <label for="jwb{{ $i }}">Jawaban {{ $i }}</label>
                <textarea name="jwb{{ $i }}" class="form-control"></textarea>
            </div>
        @endfor

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('tiu.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
