{{-- resources/views/riasec/show.blade.php --}}
@extends('layouts.backend.app')

@section('content')
<div class="container">
    <h1>Detail Data RIASEC</h1>
    <p><strong>No Pendaftaran:</strong> {{ $riasec->no_pendaftaran }}</p>

    @for ($i = 1; $i <= 42; $i++)
        <p><strong>Jawab{{ $i }}:</strong> {{ $riasec->{'jawab' . $i} }}</p>
    @endfor

    <a href="{{ route('riasec.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
