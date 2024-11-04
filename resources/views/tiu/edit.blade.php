<!-- resources/views/tiu/edit.blade.php -->
@extends('layouts.backend.app')

@section('content')
<div class="container">
    <h1>Edit Data Tiu</h1>

    <form action="{{ route('tiu.update', $tiu->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="no_pendaftaran">No Pendaftaran</label>
            <input type="number" name="no_pendaftaran" class="form-control" value="{{ $tiu->no_pendaftaran }}" required>
        </div>

        <!-- Tambahkan input untuk jwb1 - jwb30 -->
        @for ($i = 1; $i <= 30; $i++)
            <div class="form-group">
                <label for="jwb{{ $i }}">Jawaban {{ $i }}</label>
                <textarea name="jwb{{ $i }}" class="form-control">{{ $tiu->{'jwb'.$i} }}</textarea>
            </div>
        @endfor

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('tiu.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
