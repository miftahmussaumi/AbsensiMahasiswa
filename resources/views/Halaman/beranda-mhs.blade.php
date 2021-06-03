@extends('template.index')

@section('title','Home')
@section('judul_atas')
<h1>Home</h1>
@endsection

@section('container')
<div class="container-fluid">
    <div class="callout callout-info">
        <h2><i class="fas fa-door-open"></i> Selamat Datang </h2>
        Website ini digunakan untuk mengelola rekapitulasi absensi mahasiswa.
    </div>
    <div class="invoice p-3 mb-3">
        <div class="row invoice-info">
            Ini Halaman Mahasiswa
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection