@extends('template.index')

@section('title','Home')
@section('judul_atas')
<h1>Home</h1>
@endsection

@section('container')
<div class="container-fluid">
    <div class="callout callout-info">
        <h2><i class="fas fa-door-open"></i> Selamat Datang </h2>
        Website ini digunakan untuk mengelola rekapitulasi absensi mahasiswa. Selamat Bekerja ! 
    </div>
    <div class="invoice p-3 mb-3">
        <div class="row invoice-info">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div>
                    <img src="{{asset('img/unand.png')}}" width="150">
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$jml_mhs}}</h3>

                        <p>Mahasiswa</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('mahasiswa')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$jml_kls}}<sup style="font-size: 20px"></sup></h3>

                        <p>Kelas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('kelas')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-sm-12 invoice-col">
                <br>
                From
                <address>
                    <strong>Nama Kelompok : Fantastic Four</strong><br>
                    Anggota Kelompok :<br>
                    1. Miftah Mussaumi Adi              - 1911522009<br>
                    2. Laila Rahmatul Aufa Welza Putri  - 1911522013<br>
                    3. M.Ravy Octa Nugraha              - 1911523007 <br>
                    4. Fathia Rahma Nazhifa             - 1911523013 <br>
                    <!-- 5. M.Kevin Beslia              - 1911523007 -->
                </address>
            </div>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection