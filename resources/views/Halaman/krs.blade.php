@extends('template.index')

@section('title','Detail')
@section('judul_atas')
<h1>Detail Kelas</h1>
@endsection

@section('container')
<div class="container-fluid">
    <div class="invoice p-3 mb-3">
        <div class="row invoice-info">
            <div class="col-sm-5 invoice-col">
                <b>Kode Kelas {{$kelas->kode_kelas}}</b><br>
                <br>
                <b>Kode MatKul : </b> {{$kelas->kode_matkul}}<br>
                <b>Mata Kuliah : </b> {{$kelas->nama_matkul}}<br>
                <b>Tahun : </b> {{$kelas->tahun}} <br>
                <b>Semester : </b> {{$kelas->semester}} <br>
                <b>Jumlah SKS : </b> {{$kelas->sks}} <br>
                <b>Pertemuan :</b><br>
                <p>Pertemuan ke-</p><br>
                <a href="{{route('tambah-pertemuan')}}"><input type="button" value="+ Pertemuan" class="btn btn-success"></a>
            </div>
            <div class="col-sm-7 invoice-col">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
    </div>

</div>
@endsection