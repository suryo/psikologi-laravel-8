{{-- resources/views/riasec/edit.blade.php --}}
@extends('layouts.backend.app')

@section('content')
<div class="container">
    <h1>Edit Data RIASEC</h1>
    <form action="{{ route('riasec.update', $riasec->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>No Pendaftaran</label>
            <input type="text" name="no_pendaftaran" class="form-control" value="{{ $riasec->no_pendaftaran }}" required>
        </div>

        @for ($i = 1; $i <= 42; $i++)
            <div class="form-group">
                <label>Jawab{{ $i }}</label>
                <textarea name="jawab{{ $i }}" class="form-control">{{ $riasec->{'jawab' . $i} }}</textarea>
            </div>
        @endfor

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
