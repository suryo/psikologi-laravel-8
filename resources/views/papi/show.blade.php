<!-- resources/views/papi/show.blade.php -->
@extends('layouts.backend.app')

@section('content')
<div class="container">
    <h1>Detail Data PAPI</h1>
    <p><strong>No Pendaftaran:</strong> {{ $papi->no_pendaftaran }}</p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Jawaban</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 1; $i <= 90; $i++)
                <tr>
                    <td>Jawaban {{ $i }}</td>
                    <td>{{ $papi->{'jwb'.$i} }}</td>
                </tr>
            @endfor
        </tbody>
    </table>

    <a href="{{ route('papi.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
