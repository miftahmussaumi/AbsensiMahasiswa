@extends('template.index')

@section('title','Kelas')
@section('judul_atas')
@foreach($pert as $pt)
<h1>Detail Kelas {{$pt->kode_kelas}}</h1>
@endsection

@section('container')
<div class="container-fluid">
    <div class="invoice p-3 mb-3">
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <b>Pertemuan ke- {{$pt->pertemuan_ke}}</b><br>
                <br>
                <b>Kode MatKul : </b> {{$pt->kode_matkul}}<br>
                <b>Mata Kuliah : </b> {{$pt->nama_matkul}}<br>
                <b>Tahun : </b> {{$pt->tahun}} <br>
                <b>Semester : </b> {{$pt->semester}} <br>
                <b>Jumlah SKS : </b> {{$pt->sks}} <br>
                @endforeach
                <a href="{{url('detail',$pt->kelas_id)}}">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 invoice-col">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Masuk</th>
                            <th>Keluar</th>
                            <th>Durasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td>1911522009</td>
                            <td>Miftah Mussaumi Adi</td>
                            <td>Hadir</td>
                            <td>10:57:51 AM</td>
                            <td>11:57:51 AM</td>
                            <td>1</td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
        @endsection