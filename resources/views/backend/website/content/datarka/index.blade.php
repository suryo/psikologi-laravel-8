@extends('layouts.backend.app')

@section('title')
    Data RKA
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
                        <h2> Document RKA</h2>
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
                                    <div class="card-header header-bottom">
                                        <h4>Tambah Data RKA</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action=" {{ route('backend-datarka.store') }} " method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="basicInput">File</label>
                                                        <input type="file"
                                                            class="form-control @error('document_rka') is-invalid @enderror"
                                                            name="document_rka" placeholder="document_rka" />
                                                        @error('document_rka')
                                                            <div class="invalid-feedback">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- <div class="col-6">
                                                <div class="form-group">
                                                    <label for="basicInput">Urutan Gambar Slider</label>
                                                    <select name="urutan" class="form-control @error('urutan') is-invalid @enderror">
                                                        <option value="">-- Pilih --</option>
                                                        <option value="0">Pertama</option>
                                                        <option value="1">Kedua</option>
                                                        <option value="2">Ketiga</option>
                                                    </select>
                                                    @error('urutan')
                                                        <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div> --}}
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="basicInput">Title</label> <span
                                                            class="text-danger">*</span>
                                                        <input type="text" name="title"
                                                            class="form-control @error('title') is-invalid @enderror">
                                                        @error('title')
                                                            <div class="invalid-feedback">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="basicInput">Description</label> <span
                                                            class="text-danger">*</span>
                                                        <textarea name="desc" class="form-control  @error('desc') is-invalid @enderror" rows="3"></textarea>
                                                        @error('desc')
                                                            <div class="invalid-feedback">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <button class="btn btn-primary" type="submit">Tambah</button>
                                            <a href="{{ route('backend-datarka.index') }}" class="btn btn-warning">Batal</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header border-bottom">
                                        <h4 class="card-title">Data RKA</h4>
                                    </div>
                                    <div class="card-datatable">
                                        <table class="dt-responsive table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>No</th>
                                                    <th>User</th>
                                                    <th>Document</th>
                                                    <th>Jenis</th>
                                                    <th>Aktif</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($datarka as $key => $datarkas)
                                                    <tr>
                                                        <td></td>
                                                        <td> {{ $key + 1 }} </td>
                                                        <?php
                                                        $user = App\Models\User::find($datarkas->user_id);
                                                        ?>
                                                        <td>{{ $user->name }}</td>

                                                        <td> <a
                                                                href="document_rka/{{ $datarkas->document_rka }}">{{ $datarkas->document_rka }}</a>
                                                        </td>
                                                        <td>{{ $datarkas->jenis }}</td>
                                                        <td> {{ $datarkas->is_active == '0' ? 'Aktif' : 'Tidak Aktif' }}
                                                        </td>
                                                        <td>{{ $datarkas->status }}</td>

                                                        <td>
                                                            <a href=" {{ route('backend-datarka.edit', $datarkas->id) }} "
                                                                class="btn btn-success btn-sm">Edit</a>
                                                        </td>
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
