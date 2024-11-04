{{-- resources/views/riasec/create.blade.php --}}
@extends('layouts.backend.app')

@section('content')
<div class="container">
    <h1>Tambah Data RIASEC</h1>
    <form action="{{ route('riasec.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>No Pendaftaran</label>
            <input type="text" name="no_pendaftaran" class="form-control" required>
        </div>

        @for ($i = 1; $i <= 42; $i++)
            <div class="form-group">
                <label>Jawab{{ $i }}</label>
                <textarea name="jawab{{ $i }}" class="form-control"></textarea>
            </div>
        @endfor

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
