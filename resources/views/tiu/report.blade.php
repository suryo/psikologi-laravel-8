@extends('layouts.backend.app')


@section('content')
    <div class="container">
        <h3>Result TIU</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable">
                <th>
                    No Pendaftaran
                </th>

                <th>Jumlah Benar</th>
                <th>SS</th>
                <th>Cluster</th>
                {{-- <th>Action</th> --}}

                @forelse ($data as $tiu)
                    <tr>
                        <td>{{ $tiu->no_pendaftaran }}</td>
                        <td>{{ $tiu->jumlahbenar }}</td>
                        <td>{{ $tiu->ss }}</td>
                        <td>{{ $tiu->cluster }}</td>

                        {{-- <td class="text-center"> --}}
                        {{-- <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('post.destroy', $papi->id) }}" method="POST">
                                            <a href="{{ route('post.edit', $papi->id) }}"
                                                class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form> --}}
                        {{-- </td> --}}
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
