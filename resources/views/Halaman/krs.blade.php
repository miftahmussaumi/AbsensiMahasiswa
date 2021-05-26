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
                @foreach($pert as $dt)
                <a href="{{url('detail-pertemuan',$dt->pertemuan_id)}}">Pertemuan ke-{{$dt->pertemuan_ke}}</a>
                <input type="hidden" value="{{$kelas->id}}" name="kelas_id">
                @endforeach
                <br><br>
                <a href="{{url('tambah-pertemuan',$dt->kelas_id)}}"><input type="button" value="+ Pertemuan" class="btn btn-danger"></a>
                <a href="#"><input type="button" value="+ Mahasiswa" class="btn btn-success"></a>
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
                        @foreach($krs as $mhs)
                        <tr>
                            <td>{{$mhs->nim}}</td>
                            <td>{{$mhs->nama}}</td>
                            <td>hm</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
    </div>
</div>
@endsection