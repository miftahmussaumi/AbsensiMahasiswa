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
                @if($dt->pertemuan_ke > 0)
                <a href="{{url('detail-pertemuan',$dt->pertemuan_id)}}">Pertemuan ke-{{$dt->pertemuan_ke}}</a>
                @else <p>Pertemuan Masih Kosong</p>
                @endif
                @endforeach
                <br><br>
                <a href="{{url('tambah-pertemuan',$dt->kelas_id)}}"><input type="button" value="+ Pertemuan" class="btn btn-danger"></a>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                    + Mahasiswa
                </button>
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
                            <td>tombol Hapus</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{route ('simpan-mhs')}}" method="post">
                            <div class="modal-header">
                                <h4 class="modal-title">Kelas {{$kelas->kode_kelas}} </h4>
                                <input type="text" hidden value="{{ $kelas->id }}" name="kelas_id">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- select -->
                                <div class="form-group">
                                    <label>Tambah Mahasiswa</label>
                                    <select class="form-control" name="nama_mhs">
                                        <option disabled selected>- Pilih Mahasiswa -</option>
                                        @foreach ($datamhs as $tb)
                                        <option value="{{ $tb->id_mhs }}">{{$tb->nama_mhs}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <!-- <input type="submit" class="btn btn-primary"> -->
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </div>
    </div>
</div>
@endsection