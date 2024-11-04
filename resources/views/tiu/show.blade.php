<!-- resources/views/tiu/show.blade.php -->
@extends('layouts.backend.app')

@section('content')
<div class="container">
    <h1>Detail Tiu</h1>

    <div class="form-group">
        <strong>No Pendaftaran:</strong> {{ $tiu->no_pendaftaran }}
    </div>

    <!-- Tampilkan jawaban dari jwb1 sampai jwb30 -->
    @for ($i = 1; $i <= 30; $i++)
        <div class="form-group">
            <strong>Jawaban {{ $i }}:</strong> {{ $tiu->{'jwb'.$i} }}
        </div>
    @endfor

    <a href="{{ route('tiu.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
