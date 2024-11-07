@extends('layouts.Frontend.app')

@section('title')
    Profile
@endsection

@section('content')
@section('about')
    <div class="container">
        @if ($profile)
            <div style="margin-top: 5%;">
                <img src="{{ asset('storage/images/profileSekolah/' . $profile->image) }}" class="img-responsive"
                    style="max-height:500px; width:100%; object-fit:cover">
            </div>
            <h2 class="title-center">{{ $profile->title }}</h2>
            <p class="sub-title-full-width">{{ $profile->content }}</p>


            <div class="text-center">
                <img src="images/psikolog-griya.png" width="100%" height="auto" style="max-width: 500px">
            </div>
            <h2 class="title-center">PROFIL MEMBER</h2>
            <p>
                <b>Firsty Oktaria Grahani, S.Psi.,M.Psi.,Psikolog.</b>
            </p>
            <p>
                Lulusan Sarjana Psikologi dan Magister Profesi Psikologi
                Universitas Surabaya. Memiliki pengalaman sebagai asesor
                kompetensi bidang kewirausahaan sekaligus sebagai konsultan bidang
                pendidikan dan perkembangan anak dan remaja.
            </p>
            <hr>
            <p> <b>Aironi Zuroida, S.Psi.,M.Psi.,Psikolog.</b></p>
            <p> Lulusan Magister Profesi Universitas 17 Agustus 1945 Surabaya.
                Memiliki pengalaman dalam asesmen psikologi selama lebih dari 10
                tahun. Berpengalaman dalam Human Resources Development meliputi
                identifikasi kebutuhan klien, perencanaan program, hingga
                implementasi program.</p>
            <hr>
            <p> <b>Ardianti Agustin, S.Psi.,M.Psi.,Psikolog.</b></p>
            <p> Lulusan Sarjana Psikologi dan Magister Profesi Psikologi
                Universitas 17 Agustus 1945 Surabaya. Memiliki pengalaman
                Psychotherapy ABK serta assesmen psikologi klinis.</p>
            <hr>
            <p><b>Ressy Mardiati, S.Psi.,M.Psi.,Psikolog.</b></p>
            <p> Lulusan Sarjana Psikologi dan Magister Profesi Psikologi
                Universitas Surabaya. Berpengalaman di bidang HRD, meliputi
                psychological assessment untuk seleksi dan training.</p>
            <hr>
            <p><b> Starry Kireida Kusnadi, S.Psi.,M.Psi.,Psikolog.</b></p>
            <p>Lulusan Sarjana Psikologi dan Magister Profesi Psikologi
                Universitas 17 Agustus 1945 Surabaya. Berpengalaman dalam
                menangani anak ABK dan menekuni bidang psikologi
                perkembangan/klinis.</p>
            <hr>
            <p><b>Fifin Dwi Purwaningtyas, S.Psi.,M.Psi.,Psikolog.</b></p>
            <p> Lulusan Sarjana Psikologi dan Magister Profesi Psikologi
                Universitas Airlangga. Memiliki pengalaman sebagai pembicara di
                berbagai instansi. Memiliki konsentrasi di bidang psikologi klinis
                dan pendidikan.</p>
            <hr>
            <p><b> Dr. Nur Irmayanti, S.Psi.,M.Psi.</b></p>
            <p> Lulusan Program Doktoral Universitas Negeri Malang dan memiliki
                konsentrasi di bidang psikologi pendidikan khususnya tentang
                Cyberbullying</p>
            <hr>
            <p><b> Birgita Dhei, S.Psi.</b></p>
            <p> Lulusan Fakultas Psikologi Universitas Wijaya Putra ini telah
                berpengalaman dalam administrasi tes Psikologi. Kecepatan dan
                ketepatan dalam menyajikan data dapat membantu proses evaluasi
                yang cepat dan akurat. Saat ini bertanggung jawab dalam proses
                administrasi Tes dalam pelayanan harian.</p>
            <hr>
        @else
            <img src="{{ asset('Assets/Frontend/img/empty.svg') }}" class="img-responsive"
                style="object-fit:cover; margin-top:5% !important; display: block;
            margin: 0 auto;">
        @endif
    </div>
@endsection

{{-- Guru --}}
@section('guru')
    @include('frontend.content.guru')
@endsection
@endsection
