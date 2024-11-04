<!-- resources/views/papi/edit.blade.php -->
@extends('layouts.backend.app')

@section('content')
<div class="container">
    <h1>Edit Data PAPI</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('papi.update', $papi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="no_pendaftaran">No Pendaftaran</label>
            <input type="text" name="no_pendaftaran" class="form-control" value="{{ $papi->no_pendaftaran }}" required>
        </div>

        @for ($i = 1; $i <= 90; $i++)
            <div class="form-group">
                <label for="jwb{{ $i }}">Jawaban {{ $i }}</label>
                <textarea name="jwb{{ $i }}" class="form-control">{{ $papi->{'jwb'.$i} }}</textarea>
            </div>
        @endfor

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
