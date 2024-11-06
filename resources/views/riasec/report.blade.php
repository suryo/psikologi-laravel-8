@extends('layouts.backend.app')

@section('content')
    <div class="container">
        <h3>RIASEC Result</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable">
                {{-- <table class="table table-bordered"> --}}
                <th>
                    No Pendaftaran
                </th>

                <th>rs</th>
                <th>is</th>
                <th>as</th>
                <th>ss</th>
                <th>es</th>
                <th>cs</th>
                <th>description</th>



                @forelse ($data as $riasec)
                    <tr>
                        <td>{{ $riasec->no_pendaftaran }}</td>
                        <td>{{ $riasec->rs }}</td>
                        <td>{{ $riasec->is }}</td>
                        <td>{{ $riasec->as }}</td>
                        <td>{{ $riasec->ss }}</td>
                        <td>{{ $riasec->es }}</td>
                        <td>{{ $riasec->cs }}</td>
                        <td>{!! $riasec->desk !!}</td>


                       
                    </tr>
                @empty
                    <tr>
                        <td class="text-center text-mute" colspan="4">Data tidak tersedia</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
    {{-- nama <?= $name ?>
    nama {{$name}}
    html {!!$cobahtml!!} --}}
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/ecommerce-datatables.init.js') }}"></script>
@endsection
