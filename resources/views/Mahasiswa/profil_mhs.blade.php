@extends('template.index')

@section('title','Mahasiswa')
@section('judul_atas')
<h1>Welcome !</h1>
@endsection

@section('container')
<div class="container-fluid">
    <div class="invoice p-3 mb-3">
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        Profil
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-5 text-center">
                                <img src="{{asset('img/mhs.png')}}" alt="user-avatar" class="img-circle img-fluid">
                            </div>
                            <div class="col-7">
                                <h2 class="lead"><b>{{$mahasiswa->nama}}</b></h2>
                                <p class="text-muted text-sm"><b>About: <br></b>Mahasiswa Aktif Sistem Informasi Unand</p>
                                <p class="text-muted text-sm"><b>Nim: <br></b>{{$mahasiswa->nim}}</p>
                                <p class="text-muted text-sm"><b>Email: <br></b>{{$mahasiswa->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
            <div class="col-sm-1 invoice-col">
            </div>
            <div class="col-sm-5 invoice-col">
                <h4 style="text-align: center;">Daftar Kelas</h4>
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Kelas</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    ?>
                    <tbody>
                        @foreach($kelas as $kls)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$kls->kode_kelas}}</td>
                            <td><a href="{{ url('detail-kelas',$kls->krs_id) }}">Detail</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection