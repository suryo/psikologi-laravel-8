@extends('layouts.backend.app')

@section('title')
    TPPS
@endsection

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <div class="alert-body">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        </div>
    @elseif($message = Session::get('error'))
        <div class="alert alert-danger" role="alert">
            <div class="alert-body">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        </div>
    @endif
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2> TPPS</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Pengajar <a href=" {{route('backend-pengguna-tpps.create')}} " class="btn btn-primary">Tambah</a> </h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Nama</th>
                                                {{-- <th>Mengajar</th> --}}
                                                {{-- <th>NIP</th> --}}
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>    
                                        <tbody>
                                           @foreach ($tpps as $key => $tppss)
                                                <tr>
                                                    <td></td>
                                                    <td> {{$key+1}} </td>
                                                    <td> {{$tppss->name}} </td>
                                                    {{-- <td> {{$tppss->userDetail->mengajar}} </td> --}}
                                                    {{-- <td> {{$tppss->userDetail->nip}} </td> --}}
                                                    <td> {{$tppss->email}} </td>
                                                    <td> {{$tppss->status == 'Aktif' ? 'Aktif' : 'Tidak Aktif'}} </td>
                                                    <td><a href=" {{route('backend-pengguna-tpps.edit', $tppss->id)}} " class="btn btn-success btn-sm">Edit</a></td>
                                                </tr>
                                           @endforeach
                                        </tbody>                                   
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
