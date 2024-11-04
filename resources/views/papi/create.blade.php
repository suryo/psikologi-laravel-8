<!-- resources/views/papi/create.blade.php -->
@extends('layouts.backend.app')

@section('content')
<div class="container">
    <h1>Tambah Data PAPI</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('papi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="no_pendaftaran">No Pendaftaran</label>
            <input type="text" name="no_pendaftaran" class="form-control" required>
        </div>

        @for ($i = 1; $i <= 90; $i++)
            <div class="form-group">
                <label for="jwb{{ $i }}">Jawaban {{ $i }}</label>
                <textarea name="jwb{{ $i }}" class="form-control"></textarea>
            </div>
        @endfor

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
